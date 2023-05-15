<?php
session_start(); // セッションを使用するのでスタートさせます
if($_SESSION['token'] === $_POST['token']){

  // メール送信処理
  if(isset($_SESSION['name'])){  // #2
    $name = $_SESSION['name'];
    $tel = $_SESSION['tel'];
    $applicantEmail = str_replace(array("\r","\n"),'',$_SESSION['email']);
    $detail = $_SESSION['detail'];
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
  備考欄　　　　　　　　：{$detail}

  EOD;

  // スタッフに送るお問い合わせ内容メールを構築
  $mailTitle1 = "[DPFラクラク買取]{$name}様よりお問い合わせがありました。";

	$body1 = "--__BOUNDARY__\n";
	$body1 .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
	$body1 .= $contents;
	$body1 .= "--__BOUNDARY__\n";

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
  header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . './../');
}
?>

<?php
$title = 'お問い合わせ完了｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のお問い合わせ完了ページです。';
$keywords = 'DPF買取,ラクラク,便利,お問い合わせ完了';
$is_home = false;
$path = '../../../';
include $path .'pages_line/common/head_line.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under contact-send">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <section class="area">
        <div class="inner">
          <h2 class="ttl ttl-cmn01">お問い合わせ完了</h2>
          <?php
            if($message !== ""){
              echo $message;
            }
          ?>
          <p class="txt">ブラウザを閉じてください</p>
        </div>
      </section>
    </main>

    <?php include $path .'pages_line/common/footer_line.php'; ?>
  </div>
</body>

</html>
