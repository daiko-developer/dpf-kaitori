<?php
session_start(); // セッションを使用するのでスタートさせます
if($_SESSION['token'] === $_POST['token']){

  // メール送信処理
  if(isset($_SESSION['name'])){  // #2
    $name = $_SESSION['name'];
    $nameFuri = $_SESSION['nameFuri'];
    $company = $_SESSION['company'];
    $companyFuri = $_SESSION['companyFuri'];
    $post = $_SESSION['post'];
    $address = $_SESSION['address'];
    $tel = $_SESSION['tel'];
    $applicantEmail = str_replace(array("\r","\n"),'',$_SESSION['email']);
    $pictureName = $_SESSION['pictureName'];
    $pictureUraName = $_SESSION['pictureUraName'];
    $pictureFileName = $_SESSION['pictureFileName'];
    $pictureUraFileName = $_SESSION['pictureUraFileName'];
    $bank = $_SESSION['bank'];
    $branch = $_SESSION['branch'];
    $bankType = $_SESSION['bankType'];
    $bankNumber = $_SESSION['bankNumber'];
    $bankUser = $_SESSION['bankUser'];
    $bankConfirm = $_SESSION['bankConfirm'];
    $dpfCar01 = $_SESSION['dpfCar01'];
    $dpfType01 = $_SESSION['dpfType01'];
    $dpfNumber01 = $_SESSION['dpfNumber01'];
    $dpfDetail01 = $_SESSION['dpfDetail01'];
    $dpfCar02 = $_SESSION['dpfCar02'];
    $dpfType02 = $_SESSION['dpfType02'];
    $dpfNumber02 = $_SESSION['dpfNumber02'];
    $dpfDetail02 = $_SESSION['dpfDetail02'];
    $dpfCar03 = $_SESSION['dpfCar03'];
    $dpfType03 = $_SESSION['dpfType03'];
    $dpfNumber03 = $_SESSION['dpfNumber03'];
    $dpfDetail03 = $_SESSION['dpfDetail03'];
    $dpfCar04 = $_SESSION['dpfCar04'];
    $dpfType04 = $_SESSION['dpfType04'];
    $dpfNumber04 = $_SESSION['dpfNumber04'];
    $dpfDetail04 = $_SESSION['dpfDetail04'];
    $dpfCar05 = $_SESSION['dpfCar05'];
    $dpfType05 = $_SESSION['dpfType05'];
    $dpfNumber05 = $_SESSION['dpfNumber05'];
    $dpfDetail05 = $_SESSION['dpfDetail05'];
  }  // #2

  // スタッフのメールアドレス
  $companyEmail = "master@daiko-denki.co.jp";
  $staffEmail = "astron04a.e@gmail.com";
  $staffEmail .= "," . "daiko.developer@gmail.com";

  // メール本文のフォーム入力内容
  $contents = <<<EOD

  お客様情報
  お名前　　　　　　　　：{$name}
  お名前（フリガナ）　　：{$nameFuri}
  会社名　　　　　　　　：{$company}
  会社名（フリガナ）　　：{$companyFuri}
  郵便番号　　　　　　　：{$post}
  住所　　　　　　　　　：{$address}
  電話番号　　　　　　　：{$tel}
  メールアドレス　　　　：{$applicantEmail}
  証明写真（表）　　　　：{$pictureFileName}
  証明写真（裏）　　　　：{$pictureUraFileName}

  振り込み先情報
  金融機関名　　　　　　：{$bank}
  支店名（店番）　　　　：{$branch}
  種別　　　　　　　　　：{$bankType}
  口座番号　　　　　　　：{$bankNumber}
  口座名義人（カタカナ）：{$bankUser}
  査定金額の確認　　　　：{$bankConfirm}

  買取希望マフラー
  マフラー１
  車名　　　　　　　　　：{$dpfCar01}
  車両型式　　　　　　　：{$dpfType01}
  数量　　　　　　　　　：{$dpfNumber01}
  備考欄　　　　　　　　：{$dpfDetail01}
  マフラー２
  車名　　　　　　　　　：{$dpfCar02}
  車両型式　　　　　　　：{$dpfType02}
  数量　　　　　　　　　：{$dpfNumber02}
  備考欄　　　　　　　　：{$dpfDetail02}
  マフラー３
  車名　　　　　　　　　：{$dpfCar03}
  車両型式　　　　　　　：{$dpfType03}
  数量　　　　　　　　　：{$dpfNumber03}
  備考欄　　　　　　　　：{$dpfDetail03}
  マフラー４
  車名　　　　　　　　　：{$dpfCar04}
  車両型式　　　　　　　：{$dpfType04}
  数量　　　　　　　　　：{$dpfNumber04}
  備考欄　　　　　　　　：{$dpfDetail04}
  マフラー５
  車名　　　　　　　　　：{$dpfCar05}
  車両型式　　　　　　　：{$dpfType05}
  数量　　　　　　　　　：{$dpfNumber05}
  備考欄　　　　　　　　：{$dpfDetail05}

  EOD;

  // メール本文の添付ファイル内容
  $fileBody .= "Content-Type: application/octet-stream; name=\"{$pictureFileName}\"\n";
	$fileBody .= "Content-Disposition: attachment; filename=\"{$pictureFileName}\"\n";
	$fileBody .= "Content-Transfer-Encoding: base64\n";
	$fileBody .= "\n";
	$fileBody .= chunk_split(base64_encode($pictureName));
	$fileBody .= "--__BOUNDARY__\n";
  $fileBody .= "Content-Type: application/octet-stream; name=\"{$pictureUraFileName}\"\n";
	$fileBody .= "Content-Disposition: attachment; filename=\"{$pictureUraFileName}\"\n";
	$fileBody .= "Content-Transfer-Encoding: base64\n";
	$fileBody .= "\n";
	$fileBody .= chunk_split(base64_encode($pictureUraName));
	$fileBody .= "--__BOUNDARY__";


  // スタッフに送るお問い合わせ内容メールを構築
  $mailTitle1 = "[DPFラクラク買取]{$name}様より買取申込みがきました。";

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

  申込ありがとうございます。
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
  header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . './../');
}
?>

<?php
$title = 'DPF買取申込完了｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF買取申込完了ページです。';
$keywords = 'DPF買取,ラクラク,便利,買取申込み完了';
$is_home = false;
$path = '../../../';
include $path .'pages_line/common/head_line.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase-send">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <section class="area">
        <div class="inner">
          <h2 class="ttl ttl-cmn01">買取申込完了</h2>
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
