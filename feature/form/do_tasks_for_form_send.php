<?php
/** フォーム送信画面での処理 */
session_start();
require_once '../../../common/util/escape.php';
require_once 'email_sender.php';
include_once '../../../common/util/location.php';
include_once '../../../common/util/env.php';

// Token validation
if($_POST['token'] !== $_SESSION['token']){
  // 直接send.phpにアクセスしようとしたら強制的にリダイレクト
  header($location . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . './../');
  exit;
}

$form->setValuesFromSession();

// GASを通してスプレッドシートにフォーム内容を送信
$postUrl = $form->getPostUrl();
$postData = $form->getPostData();
$jsonData = json_encode($postData);

$options = array(
    'http' => array(
        'header' => "Content-type: application/json\r\n",
        'method' => 'POST',
        'content' => $jsonData
    )
);

$context = stream_context_create($options);
$response = file_get_contents($postUrl, false, $context);

if ($response === false) {
  echo "Error: Unable to send data.";
} elseif (strpos($response, "Error:") === 0) {
  // echo $response;  // GASからのエラーメッセージを表示
} else {
  // echo "Generated ID: " . $response;
}

$newId = $response;

//// メール送信処理
$emailSender = new EmailSender();
$emailSender->attachFile(fileData: $form->fileData);

// User Mail
$mailTitle2 = $form->getMailTitleForUser();
$body2 = $form->getMailBodyForUser($newId);
try {
  $emailSender->sendToUser(to: $form->formData['applicantEmail'], subject: $mailTitle2, body: $body2);
  // echo 'メールを送信しました!';
} catch (Exception $e) {
    $message = '<p class="question-text error">『' . $form->formData['applicantEmail'] . '』宛に確認メールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡をお願いいたします。</p>';
    print('エラー');
    exit;
}

// Staff Mail
$mailTitle1 = $form->getMailTitleForStaff();
$body1 = $form->getMailBodyForStaff($newId);
try {
  $emailSender->sendToStaff(subject: $mailTitle1, body: $body1, replyTo: $form->formData['applicantEmail']);
  // echo 'メールを送信しました!';
} catch (Exception $e) {
    $message = '<p class="question-text error">何らかの理由で送信エラーが発生しました<br>しばらく待ってから再度送信してください</p>';
    print('エラー');
    exit;
}

$message = '<p class="question-text">『' . $form->formData['applicantEmail'] . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';


// End and destroy the session
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {  // #5
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params['httponly']);
}
session_destroy();
?>