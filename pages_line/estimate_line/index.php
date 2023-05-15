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

  $dpfCar01 = e($_POST['dpfCar01']);
  $dpfType01 = e($_POST['dpfType01']);
  $dpfDetail01 = e($_POST['dpfDetail01']);

  $picture01 = $_FILES['picture01'];
  $picture01FileName = $_FILES['picture01']['name'];
  $picture01Name = file_get_contents($_FILES['picture01']['tmp_name']);
  $picture01Type = exif_imagetype($_FILES['picture01']['tmp_name']);
  $picture02 = $_FILES['picture02'];
  $picture02FileName = $_FILES['picture02']['name'];
  $picture02Name = file_get_contents($_FILES['picture02']['tmp_name']);
  $picture02Type = exif_imagetype($_FILES['picture02']['tmp_name']);
  $picture03 = $_FILES['picture03'];
  $picture03FileName = $_FILES['picture03']['name'];
  $picture03Name = file_get_contents($_FILES['picture03']['tmp_name']);
  $picture03Type = exif_imagetype($_FILES['picture03']['tmp_name']);

  $errors = []; //エラー格納用配列
  //trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
  if(trim($name) === '' || trim($name) === "　"){
    $errors['name'] = "お名前を入力してください";
  }
  if(trim($dpfCar01) === '' || trim($dpfCar01) === "　"){
    $errors['dpfCar01'] = "車名を入力してください";
  }

  // エラー配列がなければ異常なし
  if(count($errors) === 0){
    // エスケープ処理をして値を変数に格納済みの入力値
    $_SESSION['name'] = $name;
    $_SESSION['tel'] = $tel;
    $_SESSION['email'] = $email;

    $_SESSION['dpfCar01'] = $dpfCar01;
    $_SESSION['dpfType01'] = $dpfType01;
    $_SESSION['dpfDetail01'] = $dpfDetail01;

    $_SESSION['picture01'] = $picture01;
    $_SESSION['picture01FileName'] = $picture01FileName;
    $_SESSION['picture01Name'] = $picture01Name;
    $_SESSION['picture01Type'] = $picture01Type;
    $_SESSION['picture02'] = $picture02;
    $_SESSION['picture02FileName'] = $picture02FileName;
    $_SESSION['picture02Name'] = $picture02Name;
    $_SESSION['picture02Type'] = $picture02Type;
    $_SESSION['picture03'] = $picture03;
    $_SESSION['picture03FileName'] = $picture03FileName;
    $_SESSION['picture03Name'] = $picture03Name;
    $_SESSION['picture03Type'] = $picture03Type;

    header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/estimate_line_confirm');
  }else{
    // エラー配列があればエラーを表示
    echo $errors['name'];
    echo $errors['dpfCar01'];
  }
}

// // confirm.phpから戻ってきたときに値を保持
if (isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit') {
  $name = $_SESSION['name'];
  $tel = $_SESSION['tel'];
  $email = $_SESSION['email'];

  $dpfCar01 = $_SESSION['dpfCar01'];
  $dpfType01 = $_SESSION['dpfType01'];
  $dpfDetail01 = $_SESSION['dpfDetail01'];

  $picture01 = $_SESSION['picture01'];
  $picture01FileName = $_SESSION['picture01FileName'];
  $picture01Name = $_SESSION['picture01Name'];
  $picture01Type = $_SESSION['picture01Type'];
  $picture02 = $_SESSION['picture02'];
  $picture02FileName = $_SESSION['picture02FileName'];
  $picture02Name = $_SESSION['picture02Name'];
  $picture02Type = $_SESSION['picture02Type'];
  $picture03 = $_SESSION['picture03'];
  $picture03FileName = $_SESSION['picture03FileName'];
  $picture03Name = $_SESSION['picture03Name'];
  $picture03Type = $_SESSION['picture03Type'];
};
?>

<?php
$title = 'DPF写真お見積り｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積りページです。';
$keywords = 'DPF買取,ラクラク,便利,DPF写真お見積り';
$is_home = false;
$path = '../../';
include $path .'pages_line/common/head_line.php';
?>
<!DOCTYPE html>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate-form">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">写真お見積り</h2>

      <section class="areas">
        <div class="inner1500">
          <form id="estimate-form" class="form" method="POST" action="./" enctype="multipart/form-data">
            <div class="block">
              <div class="head">お客様情報</div>
              <ul class="list01">
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="estimate-form-name">お名前</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="estimate-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($name)) {echo $name;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="estimate-form-tel">電話番号</label>
                      </div>
                      <div class="data">
                        <input id="estimate-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($tel)) {echo $tel;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="estimate-form-mail">メールアドレス</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="estimate-form-mail" class="input" type="text" name="email" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($email)) {echo $email;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="block">
              <div class="head">マフラー情報</div>
              <ul class="list01">
                <li class="item01">
                  <div class="datattl">
                    <label for="estimate-form-car01">車名</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="estimate-form-car01" class="input" type="text" name="dpfCar01" placeholder="キャンター" value="<?php if (isset($dpfCar01)) {echo $dpfCar01;} ?>" required>
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="estimate-form-type01">車両型式</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="estimate-form-type01" class="input" type="text" name="dpfType01" placeholder="FE82DG" value="<?php if (isset($dpfType01)) {echo $dpfType01;} ?>" required>
                  </div>
                </li>
                <li class="item01 -fullsize">
                  <div class="datattl">
                    <label for="estimate-form-detail01">備考欄</label>
                  </div>
                  <div class="data">
                    <textarea id="estimate-form-detail01" name="dpfDetail01" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($dpfDetail01)) {echo $dpfDetail01;} ?>"></textarea>
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="estimate-form-picture01">DPF写真１</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="estimate-form-picture01" type="file" name="picture01" value="<?php if (isset($picture01)) {echo $picture01;} ?>" required>
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="estimate-form-picture02">DPF写真２</label>
                  </div>
                  <div class="data">
                    <input id="estimate-form-picture02" type="file" name="picture02" value="<?php if (isset($picture02)) {echo $picture02;} ?>">
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="estimate-form-picture03">DPF写真３</label>
                  </div>
                  <div class="data">
                    <input id="estimate-form-picture03" type="file" name="picture03" value="<?php if (isset($picture03)) {echo $picture03;} ?>">
                  </div>
                </li>
              </ul>
            </div>
            <div class="block-btn">
              <button id="estimate-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'pages_line/common/footer_line.php'; ?>
  </div>
</body>

</html>
