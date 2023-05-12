<?php
session_start(); // セッションを使用するのでスタートさせます
if($_SESSION['token'] === $_POST['token']){

  // メール送信処理
  if(isset($_SESSION['name'])){  // #2
    $name = $_SESSION['name'];
    $tel = $_SESSION['tel'];
    $applicantEmail = str_replace(array("\r","\n"),'',$_SESSION['email']);

    $dpfCar01 = $_SESSION['dpfCar01'];
    $dpfType01 = $_SESSION['dpfType01'];
    $dpfDetail01 = $_SESSION['dpfDetail01'];

    $picture01Name = $_SESSION['picture01Name'];
    $picture01FileName = $_SESSION['picture01FileName'];
    $picture02Name = $_SESSION['picture02Name'];
    $picture02FileName = $_SESSION['picture02FileName'];
    $picture03Name = $_SESSION['picture03Name'];
    $picture03FileName = $_SESSION['picture03FileName'];
  }  // #2

  // スタッフのメールアドレス
  $companyEmail = "master@daiko-denki.co.jp";
  $staffEmail = "astron04a.e@gmail.com";
  $staffEmail .= "," . "daiko.developer@gmail.com";

  // メール本文のフォーム入力内容
  $contents = <<<EOD

  お客様情報
  お名前　　　　　　　　：{$name}
  電話番号　　　　　　　：{$tel}
  メールアドレス　　　　：{$applicantEmail}

  マフラー情報
  車名　　　　　　　　　：{$dpfCar01}
  車両型式　　　　　　　：{$dpfType01}
  備考欄　　　　　　　　：{$dpfDetail01}
  DPF写真１　　　　　　：{$picture01FileName}
  DPF写真２　　　　　　：{$picture02FileName}
  DPF写真３　　　　　　：{$picture03FileName}

  EOD;

  // メール本文の添付ファイル内容
  $fileBody .= "Content-Type: application/octet-stream; name=\"{$picture01FileName}\"\n";
	$fileBody .= "Content-Disposition: attachment; filename=\"{$picture01FileName}\"\n";
	$fileBody .= "Content-Transfer-Encoding: base64\n";
	$fileBody .= "\n";
	$fileBody .= chunk_split(base64_encode($picture01Name));
	$fileBody .= "--__BOUNDARY__\n";
  $fileBody .= "Content-Type: application/octet-stream; name=\"{$picture02FileName}\"\n";
	$fileBody .= "Content-Disposition: attachment; filename=\"{$picture02FileName}\"\n";
	$fileBody .= "Content-Transfer-Encoding: base64\n";
	$fileBody .= "\n";
	$fileBody .= chunk_split(base64_encode($picture02Name));
	$fileBody .= "--__BOUNDARY__\n";
  $fileBody .= "Content-Type: application/octet-stream; name=\"{$picture03FileName}\"\n";
	$fileBody .= "Content-Disposition: attachment; filename=\"{$picture03FileName}\"\n";
	$fileBody .= "Content-Transfer-Encoding: base64\n";
	$fileBody .= "\n";
	$fileBody .= chunk_split(base64_encode($picture03Name));
	$fileBody .= "--__BOUNDARY__";


  // スタッフに送るお問い合わせ内容メールを構築
  $mailTitle1 = "[DPFラクラク買取]{$name}様よりDPF写真お見積りがきました。";

	$body1 = "--__BOUNDARY__\n";
	$body1 .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
	$body1 .= $contents;
	$body1 .= "--__BOUNDARY__\n";
	$body1 .= $fileBody;

  $header1 = '';
	$header1 .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
	$header1 .= "From: " . $applicantEmail ." \n";


  // 相手に送る送信完了メールを構築
  $mailTitle2 = "【自動送信】受付を完了いたしました。";

	$body2 = "--__BOUNDARY__\n";
	$body2 .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
	$body2 .= <<<EOD

  お問い合わせありがとうございます。
  以下の内容を送信いたしました。
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  {$contents}
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  E-mail: astron04a.e@email.com
  DPFラクラク買取

  EOD;
	$body2 .= "--__BOUNDARY__\n";
	$body2 .= $fileBody;

  $org = "DPFラクラク買取";
  $from = "{$org} <{$companyEmail}>";

  $header2 = '';
	$header2 .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
	$header2 .= "Return-Path: " . $companyEmail . " \n";
	$header2 .= "From: " . $from ." \n";
	$header2 .= "Sender: " . $from ." \n";
	$header2 .= "Reply-To: " . $companyEmail . " \n";
	$header2 .= "Organization: " . $org . " \n";
	$header2 .= "X-Sender: " . $org . " \n";
	$header2 .= "X-Priority: 3 \n";


  // メールを送るときのおまじない
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $param = "-f" . $staffEmail;
  //  mb_send_mail(送信先,タイトル,本文,追加ヘッダ,追加コマンドラインパラメータ)
  if (mb_send_mail($applicantEmail, $mailTitle2, $body2, $header2, $param)) { // 相手に送信

    $message = '<p class="question-text">『' . $applicantEmail . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';

    if (mb_send_mail($companyEmail,$mailTitle1,$body1,$header1,$param)) { // 自分に送信

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
    $message = '<p class="question-text error">『' . $applicantEmail . '』宛に確認メールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡をお願いいたします。</p>';
  }

} else {

  // 直接send.phpにアクセスしようとしたら強制的にリダイレクト
  header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/estimate_form_line.php');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
  <title>DPF写真見積り完了|カンタンでどこよりも便利なDPFラクラク買取</title>
  <meta name="description" content="カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積り完了ページです。">
  <meta name="keywords" content="DPF買取,ラクラク,便利,DPF写真お見積り完了">
  <link rel="icon" href="../favicon.ico">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0854b0394e.js" crossorigin="anonymous"></script>
  <script src="../js/common.js"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate-send">
    <!-- ヘッダー -->
    <script>headerLine("./");</script>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <section class="area">
        <div class="inner">
          <h2 class="ttl ttl-cmn01">写真見積り完了</h2>
          <?php
            if($message !== ""){
              echo $message;
            }
          ?>
          <p class="txt">ブラウザを閉じてください</p>
        </div>
      </section>
    </main>

    <!-- フッター -->
    <script>footerLine("./");</script>
  </div>
</body>

</html>
