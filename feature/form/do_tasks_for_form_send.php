<?php
/** フォーム送信画面での処理 */
session_start();
require_once '../../../common/util/escape.php';
include_once '../../../common/util/location.php';

// Token validation
if($_POST['token'] !== $_SESSION['token']){
  // 直接send.phpにアクセスしようとしたら強制的にリダイレクト
  header($location . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . './../');
  exit;
}

//// メール送信処理
$form->setValuesFromSession();

// Mail related functions
function buildMailHeader($type, $companyEmail, $applicantEmail, $staffEmail) {
  $org = "DPFラクラク買取";
  $header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
  if ($type === 'user') {
      $header .= "Return-Path: " . $companyEmail . " \n";
      $header .= "From: {$org} <{$companyEmail}> \n";
      $header .= "Bcc: " . $companyEmail ." \n";
      $header .= "Sender: {$org} <{$companyEmail}> \n";
      $header .= "Reply-To: " . $companyEmail . " \n";
      $header .= "Organization: " . $org . " \n";
      $header .= "X-Sender: " . $org . " \n";
      $header .= "X-Priority: 3 \n";
  } else {
      $header .= "From: " . $applicantEmail ." \n";
      $header .= "Cc: " . $staffEmail ." \n";
  }
  return $header;
}

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

$companyEmail = "master@daiko-denki.co.jp";
$staffEmail = "astron04a.e@gmail.com,daiko.developer@gmail.com";

// Build and send mails
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// User Mail
$header2 = buildMailHeader('user', $companyEmail, $form->applicantEmail, $staffEmail);
$mailTitle2 = $form->getMailTitleForUser();
$body2 = $form->getMailBodyForUser();
if (!mb_send_mail($form->applicantEmail, $mailTitle2, $body2, $header2)) {
    $message = '<p class="question-text error">『' . $form->applicantEmail . '』宛に確認メールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡をお願いいたします。</p>';
    exit;
}

// Staff Mail
$header1 = buildMailHeader('staff', $companyEmail, $form->applicantEmail, $staffEmail);
$mailTitle1 = $form->getMailTitleForStaff();
$body1 = $form->getMailBodyForStaff();
if (!mb_send_mail($companyEmail, $mailTitle1, $body1, $header1)) {
    $message = '<p class="question-text error">何らかの理由で送信エラーが発生しました<br>しばらく待ってから再度送信してください</p>';
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