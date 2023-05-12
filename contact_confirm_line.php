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

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
  <title>お問い合わせ内容確認|カンタンでどこよりも便利なDPFラクラク買取</title>
  <meta name="description" content="カンタンでどこよりも便利なDPFラクラク買取のお問い合わせ内容確認ページです。">
  <meta name="keywords" content="DPF買取,ラクラク,便利,お問い合わせ内容確認">
  <link rel="icon" href="../favicon.ico">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0854b0394e.js" crossorigin="anonymous"></script>
  <script src="../js/common.js"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under contact_confirm">
    <!-- ヘッダー -->
    <script>headerLine("./");</script>

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
          <form class="form" method="post" action="contact_send_line.php">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="block-btn">
              <a class="btn btn-cmn01" href="contact_form_line.php?action=edit">戻る</a>
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
