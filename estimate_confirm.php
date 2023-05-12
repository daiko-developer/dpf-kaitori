<?php
session_start();

if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  $tel = $_SESSION['tel'];
  $email = $_SESSION['email'];

  $dpfCar01 = $_SESSION['dpfCar01'];
  $dpfType01 = $_SESSION['dpfType01'];
  $dpfDetail01 = $_SESSION['dpfDetail01'];
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
  <title>DPF写真お見積り確認|カンタンでどこよりも便利なDPFラクラク買取</title>
  <meta name="description" content="カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積り確認ページです。">
  <meta name="keywords" content="DPF買取,ラクラク,便利,DPF写真お見積り確認">
  <link rel="icon" href="../favicon.ico">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0854b0394e.js" crossorigin="anonymous"></script>
  <script src="../js/common.js"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate_confirm">
    <!-- ヘッダー -->
    <script>header("./");</script>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">DPF写真お見積り</h2>
      </div>

      <section class="areas">
        <div class="inner">
          <h3 class="ttl ttl-cmn02">DPF写真お見積り確認</h3>
          <h4 class="ttl-cmn03">お客様情報</h4>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">お名前</dt>
              <dd class="data"><?php echo $name; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">電話番号</dt>
              <dd class="data"><?php echo empty($tel)? '-' : $tel; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">メールアドレス</dt>
              <dd class="data"><?php echo $email; ?></dd>
            </div>
          </dl>
          <h4 class="ttl-cmn03">マフラー情報</h4>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">車名</dt>
              <dd class="data"><?php echo $dpfCar01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($dpfType01)? '-' : $dpfType01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($dpfDetail01)? '-' : $dpfDetail01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">DPF写真１</dt>
              <dd class="data">
                <img class="pic" src="picture01.php" alt="DPF写真１">
              </dd>
            </div>
            <div class="item">
              <dt class="datattl">DPF写真２</dt>
              <dd class="data">
                <img class="pic" src="picture02.php" alt="DPF写真２">
              </dd>
            </div>
            <div class="item">
              <dt class="datattl">DPF写真３</dt>
              <dd class="data">
                <img class="pic" src="picture03.php" alt="DPF写真３">
              </dd>
            </div>
          </dl>
          <p class="tac">こちらの内容で送信してもよろしいですか？</p>
          <form class="form" method="post" action="estimate_send.php">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="block-btn">
              <a class="btn btn-cmn01" href="estimate_form.php?action=edit">戻る</a>
              <button class="btn btn-cmn01" type="submit" value="送信">送信</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <!-- フッター -->
    <script>footer("./");</script>
  </div>
</body>

</html>
