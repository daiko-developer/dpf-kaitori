<?php
session_start();

if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  $nameFuri = $_SESSION['nameFuri'];
  $company = $_SESSION['company'];
  $companyFuri = $_SESSION['companyFuri'];
  $post = $_SESSION['post'];
  $address = $_SESSION['address'];
  $tel = $_SESSION['tel'];
  $email = $_SESSION['email'];
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
};

$token = sha1(uniqid(mt_rand(),true));
$_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
  <title>DPF買取申込み確認|カンタンでどこよりも便利なDPFラクラク買取</title>
  <meta name="description" content="カンタンでどこよりも便利なDPFラクラク買取のDPF買取申込み確認ページです。">
  <meta name="keywords" content="DPF買取,ラクラク,便利,買取申込み確認">
  <link rel="icon" href="../favicon.ico">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0854b0394e.js" crossorigin="anonymous"></script>
  <script src="../js/common.js"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase_confirm">
    <!-- ヘッダー -->
    <script>headerLine("./");</script>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">申込内容確認</h2>

      <section class="areas">
        <div class="inner">
          <h3 class="ttl-cmn03">お客様情報</h3>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">お名前</dt>
              <dd class="data"><?php echo $name; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">お名前(フリガナ)</dt>
              <dd class="data"><?php echo $nameFuri; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">会社名</dt>
              <dd class="data"><?php echo empty($company)? '-' : $company; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">会社名(フリガナ)</dt>
              <dd class="data"><?php echo empty($companyFuri)? '-' : $companyFuri; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">郵便番号</dt>
              <dd class="data"><?php echo empty($post)? '-' : $post; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">住所</dt>
              <dd class="data"><?php echo empty($address)? '-' : $address; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">電話番号</dt>
              <dd class="data"><?php echo empty($tel)? '-' : $tel; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">メールアドレス</dt>
              <dd class="data"><?php echo $email; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">証明写真(表)</dt>
              <dd class="data">
                <img class="pic" src="picture.php" alt="証明写真(表)">
              </dd>
            </div>
            <div class="item">
              <dt class="datattl">証明写真(裏)</dt>
              <dd class="data">
                <img class="pic" src="picture_ura.php" alt="証明写真(裏)">
              </dd>
            </div>
          </dl>
          <h3 class="ttl-cmn03">振り込み先情報</h3>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">金融機関名</dt>
              <dd class="data"><?php echo $bank; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">支店名(店番)</dt>
              <dd class="data"><?php echo $branch; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">種別</dt>
              <dd class="data"><?php echo $bankType; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">口座番号</dt>
              <dd class="data"><?php echo $bankNumber; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">口座名義人(カタカナ)</dt>
              <dd class="data"><?php echo $bankUser; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">査定金額の確認</dt>
              <dd class="data"><?php echo $bankConfirm; ?></dd>
            </div>
          </dl>
          <h3 class="ttl-cmn03">買取希望マフラー</h3>
          <dl class="list-form-confirm">
            <dt class="head">マフラー１</dt>
            <div class="item">
              <dt class="datattl">車名</dt>
              <dd class="data"><?php echo $dpfCar01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($dpfType01)? '-' : $dpfType01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo $dpfNumber01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($dpfDetail01)? '-' : $dpfDetail01; ?></dd>
            </div>
            <dt class="head">マフラー２</dt>
            <div class="item">
              <dt class="datattl">車名</dt>
              <dd class="data"><?php echo empty($dpfCar02)? '-' : $dpfCar02; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($dpfType02)? '-' : $dpfType02; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($dpfNumber02)? '-' : $dpfNumber02; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($dpfDetail02)? '-' : $dpfDetail02; ?></dd>
            </div>
            <dt class="head">マフラー３</dt>
            <div class="item">
              <dt class="datattl">車名</dt>
              <dd class="data"><?php echo empty($dpfCar03)? '-' : $dpfCar03; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($dpfType03)? '-' : $dpfType03; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($dpfNumber03)? '-' : $dpfNumber03; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($dpfDetail03)? '-' : $dpfDetail03; ?></dd>
            </div>
            <dt class="head">マフラー４</dt>
            <div class="item">
              <dt class="datattl">車名</dt>
              <dd class="data"><?php echo empty($dpfCar04)? '-' : $dpfCar04; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($dpfType04)? '-' : $dpfType04; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($dpfNumber04)? '-' : $dpfNumber04; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($dpfDetail04)? '-' : $dpfDetail04; ?></dd>
            </div>
            <dt class="head">マフラー５</dt>
            <div class="item">
              <dt class="datattl">車名</dt>
              <dd class="data"><?php echo empty($dpfCar05)? '-' : $dpfCar05; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($dpfType05)? '-' : $dpfType05; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($dpfNumber05)? '-' : $dpfNumber05; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($dpfDetail05)? '-' : $dpfDetail05; ?></dd>
            </div>
          </dl>
          <p class="tac">こちらの内容で送信してもよろしいですか？</p>
          <form class="form" method="post" action="purchase_send_line.php">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="block-btn">
              <a class="btn btn-cmn01" href="purchase_form_line.php?action=edit">戻る</a>
              <button class="btn btn-cmn01" type="submit" value="送信">送信</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <!-- フッター -->
    <script>footerLine("./");</script>
  </div>
</body>

</html>
