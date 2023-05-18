<?php
/** フォーム送信画面での処理 */
session_start();
if($_SESSION['token'] === $_POST['token']){

  //// メール送信処理
  $form->setValuesFromSession();

  // スタッフのメールアドレス
  $companyEmail = "master@daiko-denki.co.jp";
  $staffEmail = "astron04a.e@gmail.com,daiko.developer@gmail.com";

  //// スタッフに送るお問い合わせ内容メールを構築
  $header1 = '';
  $header1 .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
  $header1 .= "From: " . $form->applicantEmail ." \n";
  $header1 .= "Cc: " . $staffEmail ." \n";
  $mailTitle1 = $form->getMailTitleForStaff();
  $body1 = $form->getMailBodyForStaff();

  //// 相手に送る送信完了メールを構築
  $org = "DPFラクラク買取";
  $from = "{$org} <{$companyEmail}>";
  $header2 = '';
  $header2 .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
  $header2 .= "Return-Path: " . $companyEmail . " \n";
  $header2 .= "From: " . $from ." \n";
  $header2 .= "Bcc: " . $companyEmail ." \n";
  $header2 .= "Sender: " . $from ." \n";
  $header2 .= "Reply-To: " . $companyEmail . " \n";
  $header2 .= "Organization: " . $org . " \n";
  $header2 .= "X-Sender: " . $org . " \n";
  $header2 .= "X-Priority: 3 \n";
  $mailTitle2 = $form->getMailTitleForUser();
  $body2 = $form->getMailBodyForUser();

  //// メール送信
  // メールを送るときのおまじない
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  //  mb_send_mail(送信先,タイトル,本文,追加ヘッダ,追加コマンドラインパラメータ)
  if (mb_send_mail($form->applicantEmail, $mailTitle2, $body2, $header2)) { // 相手に送信

    $message = '<p class="question-text">『' . $form->applicantEmail . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';

    if (mb_send_mail($companyEmail, $mailTitle1, $body1, $header1)) { // 自分に送信

      // 終了処理開始 セッションの破棄
      $_SESSION = [];
      if (isset($_COOKIE[session_name()])) {  // #5
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params['httponly']);
      }
      session_destroy();
      // セッションの破棄
    } else {
      $message = '<p class="question-text error">何らかの理由で送信エラーが発生しました<br>しばらく待ってから再度送信してください</p>';
    }
  } else {
    $message = '<p class="question-text error">『' . $form->applicantEmail . '』宛に確認メールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡をお願いいたします。</p>';
  }

} else {

  // 直接send.phpにアクセスしようとしたら強制的にリダイレクト
  include_once '../../util/location.php';
  header($location . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . './../');
}
?>