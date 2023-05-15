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

<?php
$title = 'DPF写真お見積り確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積り確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,DPF写真お見積り確認';
$is_home = false;
$path = '../../../';
include $path .'pages_line/common/head_line.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate_confirm">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">見積り内容確認</h2>

      <section class="areas">
        <div class="inner">
          <h3 class="ttl-cmn03">お客様情報</h3>
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
          <h3 class="ttl-cmn03">マフラー情報</h3>
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
          <form class="form" method="post" action="../estimate_line_send/">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="block-btn">
              <a class="btn btn-cmn01" href="../?action=edit">戻る</a>
              <button class="btn btn-cmn01" type="submit" value="送信">送信</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'pages_line/common/footer_line.php'; ?>
  </div>
</body>

</html>
