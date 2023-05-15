<?php
session_start();

// エスケープ処理
function e(string $str,string $charset = 'UTF-8'):string{
  return htmlspecialchars($str,ENT_QUOTES | ENT_HTML5,$charset);
}

// 送信ボタンが押されたかどうか
if(isset($_POST['submit'])){

  // POSTされたデータをエスケープ処理して変数に格納
  $name = e($_POST['name']);
  $tel = e($_POST['tel']);
  $email = e($_POST['email']);
  $detail = e($_POST['detail']);

  $errors = []; //エラー格納用配列
  //trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
  if(trim($name) === '' || trim($name) === "　"){
    $errors['name'] = "お名前を入力してください";
  }

  // エラー配列がなければ異常なし
  if(count($errors) === 0){
    // エスケープ処理をして値を変数に格納済みの入力値
    $_SESSION['name'] = $name;
    $_SESSION['tel'] = $tel;
    $_SESSION['email'] = $email;
    $_SESSION['detail'] = $detail;

    header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/contact_confirm');
  }else{
    // エラー配列があればエラーを表示
    echo $errors['name'];
  }
}

// // confirm.phpから戻ってきたときに値を保持
if (isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit') {
  $name = $_SESSION['name'];
  $tel = $_SESSION['tel'];
  $email = $_SESSION['email'];
  $detail = $_SESSION['detail'];
};
?>

<?php
$title = 'お問い合わせ｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のお問い合わせページです。';
$keywords = 'DPF買取,ラクラク,便利,お問い合わせ';
$is_home = false;
$path = '../../';
include $path .'pages/common/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under contact-form">
    <?php include $path .'pages/common/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">お問い合わせ</h2>
      </div>

      <section class="areas">
        <div class="inner1500">
          <h3 class="ttl-cmn02">お問い合わせフォーム</h3>
          <form id="contact-form" class="form" method="POST" action="./" enctype="multipart/form-data">
            <div class="block">
              <ul class="list01">
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="contact-form-name">お名前</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="contact-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($name)) {echo $name;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="contact-form-tel">電話番号</label>
                      </div>
                      <div class="data">
                        <input id="contact-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($tel)) {echo $tel;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="contact-form-mail">メールアドレス</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="contact-form-mail" class="input" type="text" name="email" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($email)) {echo $email;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01 -fullsize">
                  <div class="datattl">
                    <label for="contact-form-detail">お問い合わせ内容</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <textarea id="contact-form-detail" name="detail" placeholder="" value="<?php if (isset($detail)) {echo $detail;} ?>" required></textarea>
                  </div>
                </li>
              </ul>
            </div>
            <div class="block-btn">
              <button id="contact-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'pages/common/footer.php'; ?>
  </div>
</body>

</html>
