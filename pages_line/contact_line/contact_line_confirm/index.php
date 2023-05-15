<?php
session_start();

if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  $tel = $_SESSION['tel'];
  $email = $_SESSION['email'];
  $detail = $_SESSION['detail'];
};

$token = sha1(uniqid(mt_rand(),true));
$_SESSION['token'] = $token;
?>

<?php
$title = 'お問い合わせ内容確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のお問い合わせ内容確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,お問い合わせ内容確認';
$is_home = false;
$path = '../../../';
include $path .'pages_line/common/head_line.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under contact_confirm">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">お問い合わせ内容確認</h2>

      <section class="areas">
        <div class="inner">
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
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($detail)? '-' : $detail; ?></dd>
            </div>
          </dl>
          <p class="tac">こちらの内容で送信してもよろしいですか？</p>
          <form class="form" method="post" action="../contact_line_send/">
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
