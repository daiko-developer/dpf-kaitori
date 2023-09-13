<?php
/** フォーム送信画面での処理 */
session_start();
require_once '../../../common/util/escape.php';
require_once 'EmailSender.php';
include_once '../../../common/util/location.php';
include_once '../../../common/util/env.php';

// Token validation
if($_POST['token'] !== $_SESSION['token']){
  // 直接send.phpにアクセスしようとしたら強制的にリダイレクト
  header($location . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . './../');
  exit;
}

//// メール送信処理
$form->setValuesFromSession();

// cURL POST function
function curlPostData($post_url, $post_data) {
  $ch = curl_init();
  curl_setopt_array($ch, [
      CURLOPT_URL => $post_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => json_encode($post_data),
  ]);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

$emailSender = new EmailSender();

// User Mail
$mailTitle2 = $form->getMailTitleForUser();
$body2 = $form->getMailBodyForUser();
try {
  $emailSender->sendToUser(to: $form->applicantEmail, subject: $mailTitle2, body: $body2);
  echo 'メールを送信しました!';
} catch (Exception $e) {
    $message = '<p class="question-text error">『' . $form->applicantEmail . '』宛に確認メールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡をお願いいたします。</p>';
    print('エラー');
    exit;
}

// Staff Mail
$mailTitle1 = $form->getMailTitleForStaff();
$body1 = $form->getMailBodyForStaff();
try {
  $emailSender->sendToStaff(subject: $mailTitle1, body: $body1);
  echo 'メールを送信しました!';
} catch (Exception $e) {
    $message = '<p class="question-text error">何らかの理由で送信エラーが発生しました<br>しばらく待ってから再度送信してください</p>';
    print('エラー');
    exit;
}

$message = '<p class="question-text">『' . $form->applicantEmail . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';

// POST data using cURL
$post_url = $form->getPostUrl();
$post_data = $form->getPostData();
$response = curlPostData($post_url, $post_data);


// End and destroy the session
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {  // #5
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params['httponly']);
}
session_destroy();
?>