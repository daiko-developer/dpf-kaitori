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
  $nameFuri = e($_POST['nameFuri']);
  $company = e($_POST['company']);
  $companyFuri = e($_POST['companyFuri']);
  $post = e($_POST['post']);
  $address = e($_POST['address']);
  $tel = e($_POST['tel']);
  $email = e($_POST['email']);
  $picture = $_FILES['picture'];
  $pictureUra = $_FILES['pictureUra'];
  $pictureFileName = $_FILES['picture']['name'];
  $pictureUraFileName = $_FILES['pictureUra']['name'];
  $pictureName = file_get_contents($_FILES['picture']['tmp_name']);
  $pictureUraName = file_get_contents($_FILES['pictureUra']['tmp_name']);
  $pictureType = exif_imagetype($_FILES['picture']['tmp_name']);
  $pictureUraType = exif_imagetype($_FILES['pictureUra']['tmp_name']);
  $bank = e($_POST['bank']);
  $branch = e($_POST['branch']);
  $bankType = e($_POST['bankType']);
  $bankNumber = e($_POST['bankNumber']);
  $bankUser = e($_POST['bankUser']);
  $bankConfirm = e($_POST['bankConfirm']);
  $dpfType01 = e($_POST['dpfType01']);
  $dpfCar01 = e($_POST['dpfCar01']);
  $dpfNumber01 = e($_POST['dpfNumber01']);
  $dpfDetail01 = e($_POST['dpfDetail01']);
  $dpfType02 = e($_POST['dpfType02']);
  $dpfCar02 = e($_POST['dpfCar02']);
  $dpfNumber02 = e($_POST['dpfNumber02']);
  $dpfDetail02 = e($_POST['dpfDetail02']);
  $dpfType03 = e($_POST['dpfType03']);
  $dpfCar03 = e($_POST['dpfCar03']);
  $dpfNumber03 = e($_POST['dpfNumber03']);
  $dpfDetail03 = e($_POST['dpfDetail03']);
  $dpfType04 = e($_POST['dpfType04']);
  $dpfCar04 = e($_POST['dpfCar04']);
  $dpfNumber04 = e($_POST['dpfNumber04']);
  $dpfDetail04 = e($_POST['dpfDetail04']);
  $dpfType05 = e($_POST['dpfType05']);
  $dpfCar05 = e($_POST['dpfCar05']);
  $dpfNumber05 = e($_POST['dpfNumber05']);
  $dpfDetail05 = e($_POST['dpfDetail05']);

  $errors = []; //エラー格納用配列
  //trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
  if(trim($name) === '' || trim($name) === "　"){
    $errors['name'] = "お名前を入力してください";
  }
  if(trim($nameFuri) === '' || trim($nameFuri) === "　"){
    $errors['nameFuri'] = "お名前(フリガナ)を入力してください";
  }
  if(trim($bank) === '' || trim($bank) === "　"){
    $errors['bank'] = "金融機関名を入力してください";
  }
  if(trim($branch) === '' || trim($branch) === "　"){
    $errors['branch'] = "支店名(店番)を入力してください";
  }
  if(trim($bankUser) === '' || trim($bankUser) === "　"){
    $errors['bankUser'] = "口座名義人を入力してください";
  }
  if(trim($dpfCar01) === '' || trim($dpfCar01) === "　"){
    $errors['dpfCar01'] = "車台番号を入力してください";
  }

  // エラー配列がなければ異常なし
  if(count($errors) === 0){
    // エスケープ処理をして値を変数に格納済みの入力値
    $_SESSION['name'] = $name;
    $_SESSION['nameFuri'] = $nameFuri;
    $_SESSION['company'] = $company;
    $_SESSION['companyFuri'] = $companyFuri;
    $_SESSION['post'] = $post;
    $_SESSION['address'] = $address;
    $_SESSION['tel'] = $tel;
    $_SESSION['email'] = $email;
    $_SESSION['picture'] = $picture;
    $_SESSION['pictureUra'] = $pictureUra;
    $_SESSION['pictureFileName'] = $pictureFileName;
    $_SESSION['pictureUraFileName'] = $pictureUraFileName;
    $_SESSION['pictureName'] = $pictureName;
    $_SESSION['pictureUraName'] = $pictureUraName;
    $_SESSION['pictureType'] = $pictureType;
    $_SESSION['pictureUraType'] = $pictureUraType;
    $_SESSION['bank'] = $bank;
    $_SESSION['branch'] = $branch;
    $_SESSION['bankType'] = $bankType;
    $_SESSION['bankNumber'] = $bankNumber;
    $_SESSION['bankUser'] = $bankUser;
    $_SESSION['bankConfirm'] = $bankConfirm;
    $_SESSION['dpfType01'] = $dpfType01;
    $_SESSION['dpfCar01'] = $dpfCar01;
    $_SESSION['dpfNumber01'] = $dpfNumber01;
    $_SESSION['dpfDetail01'] = $dpfDetail01;
    $_SESSION['dpfType02'] = $dpfType02;
    $_SESSION['dpfCar02'] = $dpfCar02;
    $_SESSION['dpfNumber02'] = $dpfNumber02;
    $_SESSION['dpfDetail02'] = $dpfDetail02;
    $_SESSION['dpfType03'] = $dpfType03;
    $_SESSION['dpfCar03'] = $dpfCar03;
    $_SESSION['dpfNumber03'] = $dpfNumber03;
    $_SESSION['dpfDetail03'] = $dpfDetail03;
    $_SESSION['dpfType04'] = $dpfType04;
    $_SESSION['dpfCar04'] = $dpfCar04;
    $_SESSION['dpfNumber04'] = $dpfNumber04;
    $_SESSION['dpfDetail04'] = $dpfDetail04;
    $_SESSION['dpfType05'] = $dpfType05;
    $_SESSION['dpfCar05'] = $dpfCar05;
    $_SESSION['dpfNumber05'] = $dpfNumber05;
    $_SESSION['dpfDetail05'] = $dpfDetail05;

    header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/purchase_line_confirm');
  }else{
    // エラー配列があればエラーを表示
    echo $errors['name'];
    echo $errors['nameFuri'];
    echo $errors['bank'];
    echo $errors['branch'];
    echo $errors['bankUser'];
    echo $errors['dpfCar01'];
  }
}

// // confirm.phpから戻ってきたときに値を保持
if (isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit') {
  $name = $_SESSION['name'];
  $nameFuri = $_SESSION['nameFuri'];
  $company = $_SESSION['company'];
  $companyFuri = $_SESSION['companyFuri'];
  $post = $_SESSION['post'];
  $address = $_SESSION['address'];
  $tel = $_SESSION['tel'];
  $email = $_SESSION['email'];
  $picture = $_SESSION['picture'];
  $pictureUra = $_SESSION['pictureUra'];
  $pictureFileName = $_SESSION['pictureFileName'];
  $pictureUraFileName = $_SESSION['pictureUraFileName'];
  $pictureName = $_SESSION['pictureName'];
  $pictureUraName = $_SESSION['pictureUraName'];
  $pictureType = $_SESSION['pictureType'];
  $pictureUraType = $_SESSION['pictureUraType'];
  $bank = $_SESSION['bank'];
  $branch = $_SESSION['branch'];
  $bankType = $_SESSION['bankType'];
  $bankNumber = $_SESSION['bankNumber'];
  $bankUser = $_SESSION['bankUser'];
  $bankConfirm = $_SESSION['bankConfirm'];
  $dpfType01 = $_SESSION['dpfType01'];
  $dpfCar01 = $_SESSION['dpfCar01'];
  $dpfNumber01 = $_SESSION['dpfNumber01'];
  $dpfDetail01 = $_SESSION['dpfDetail01'];
  $dpfType02 = $_SESSION['dpfType02'];
  $dpfCar02 = $_SESSION['dpfCar02'];
  $dpfNumber02 = $_SESSION['dpfNumber02'];
  $dpfDetail02 = $_SESSION['dpfDetail02'];
  $dpfType03 = $_SESSION['dpfType03'];
  $dpfCar03 = $_SESSION['dpfCar03'];
  $dpfNumber03 = $_SESSION['dpfNumber03'];
  $dpfDetail03 = $_SESSION['dpfDetail03'];
  $dpfType04 = $_SESSION['dpfType04'];
  $dpfCar04 = $_SESSION['dpfCar04'];
  $dpfNumber04 = $_SESSION['dpfNumber04'];
  $dpfDetail04 = $_SESSION['dpfDetail04'];
  $dpfType05 = $_SESSION['dpfType05'];
  $dpfCar05 = $_SESSION['dpfCar05'];
  $dpfNumber05 = $_SESSION['dpfNumber05'];
  $dpfDetail05 = $_SESSION['dpfDetail05'];
};
?>

<?php
$title = 'DPF買取申込｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取の買取申込ページです。';
$keywords = 'DPF買取,ラクラク,便利,買取申込';
$is_home = false;
$path = '../../';
include $path .'pages_line/common/head_line.php';
?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase_form">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">買取申込</h2>

      <section class="areas">
        <div class="inner1500">
          <form id="purchase-form" class="form" method="POST" action="./" enctype="multipart/form-data">
            <div class="block">
              <div class="head">お客様情報</div>
              <ul class="list01">
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-name">お名前</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($name)) {echo $name;} ?>" required>
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-name-furi">お名前(フリガナ)</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-name-furi" class="input" type="text" name="nameFuri" placeholder="タナカタロウ" value="<?php if (isset($nameFuri)) {echo $nameFuri;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-company">会社名</label>
                      </div>
                      <div class="data">
                        <input id="purchase-form-company" class="input" type="text" name="company" placeholder="〇〇株式会社" value="<?php if (isset($company)) {echo $company;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-company-furi">会社名(フリガナ)</label>
                      </div>
                      <div class="data">
                        <input id="purchase-form-company-furi" class="input" type="text" name="companyFuri" placeholder="〇〇カブシキガイシャ" value="<?php if (isset($companyFuri)) {echo $companyFuri;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-yubin">郵便番号</label>
                  </div>
                  <div class="data">
                    <input id="purchase-form-yubin" type="text" name="post" class="input -short" placeholder="000-0000" value="<?php if (isset($post)) {echo $post;} ?>" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-address">住所</label>
                  </div>
                  <div class="data">
                    <input id="purchase-form-address" class="input" type="text" name="address" placeholder="〇〇県〇〇市〇〇111-1" value="<?php if (isset($address)) {echo $address;} ?>">
                  </div>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-tel">電話番号</label>
                      </div>
                      <div class="data">
                        <input id="purchase-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($tel)) {echo $tel;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-mail">メールアドレス</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-mail" class="input" type="text" name="email" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($email)) {echo $email;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-picture">本人確認書類(表)</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="purchase-form-picture" type="file" name="picture" value="<?php if (isset($picture)) {echo $picture;} ?>" required>
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-picture-ura">本人確認書類(裏)</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="purchase-form-picture-ura" type="file" name="pictureUra" value="<?php if (isset($pictureUra)) {echo $pictureUra;} ?>" required>
                  </div>
                </li>
                <li class="item01">
                  <p class="txt">
                    本人確認書類<br>
                    運転免許証/健康保険証/パスポート/住民票/年金手帳など
                  </p>
                </li>
              </ul>
            </div>
            <div class="block">
              <div class="head">振り込み先情報</div>
              <ul class="list01">
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-name">金融機関名</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-name" class="input" type="text" name="bank" placeholder="三井住友銀行" value="<?php if (isset($bank)) {echo $bank;} ?>" required>
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-shiten">支店名(店番)</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-shiten" class="input" type="text" name="branch" placeholder="梅田支店" value="<?php if (isset($branch)) {echo $branch;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        種別<span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input type="radio" value="普通(総合)" id="purchase-form-bank-type-normal" name="bankType" <?php if (isset($bankType) && $bankType === "普通(総合)") {echo "checked";} ?> required><label for="purchase-form-bank-type-normal">普通(総合)</label>
                        <input type="radio" value="当座" id="purchase-form-bank-type-toza" name="bankType" <?php if (isset($bankType) && $bankType === "当座") {echo "checked";} ?> required><label for="purchase-form-bank-type-toza">当座</label>
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-number">口座番号</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-number" class="input" type="text" name="bankNumber" placeholder="1234567" value="<?php if (isset($bankNumber)) {echo $bankNumber;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-user-name">口座名義人<span class="ttlin">(カタカナ)</span></label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-user-name" class="input" type="text" name="bankUser" placeholder="タナカタロウ" value="<?php if (isset($bankUser)) {echo $bankUser;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01">
                  <div class="datattl">
                    査定金額の確認<span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input type="radio" value="確認する" id="purchase-form-bank-confirm-yes" name="bankConfirm" <?php if (isset($bankConfirm) && $bankConfirm === "確認する") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-yes">確認する</label>
                    <input type="radio" value="確認しない(即入金)" id="purchase-form-bank-confirm-no" name="bankConfirm" <?php if (isset($bankConfirm) && $bankConfirm === "確認しない(即入金)") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-no">確認しない(即入金)</label>
                  </div>
                </li>
              </ul>
            </div>
            <div class="block">
              <div class="head">買取希望DPF</div>
              <ul class="list03">
                <li class="item03">
                  <div class="datattl">DPF１</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type01">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type01" class="input" type="text" name="dpfType01" placeholder="FE82DG" value="<?php if (isset($dpfType01)) {echo $dpfType01;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car01">車台番号</label><span class="require">必須</span>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car01" class="input" type="text" name="dpfCar01" placeholder="ABC012-3456789" value="<?php if (isset($dpfCar01)) {echo $dpfCar01;} ?>" required>
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number01">数量</label><span class="require">必須</span>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number01" class="input" name="dpfNumber01" value="<?php if (isset($dpfNumber01)) {echo $dpfNumber01;} ?>" required>
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail01">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail01" name="dpfDetail01" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($dpfDetail01)) {echo $dpfDetail01;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF２</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type02">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type02" class="input" type="text" name="dpfType02" placeholder="FE82DG" value="<?php if (isset($dpfType02)) {echo $dpfType02;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car02">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car02" class="input" type="text" name="dpfCar02" placeholder="ABC012-3456789" value="<?php if (isset($dpfCar02)) {echo $dpfCar02;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number02">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number02" class="input" name="dpfNumber02" value="<?php if (isset($dpfNumber02)) {echo $dpfNumber02;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail02">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail02" name="dpfDetail02" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($dpfDetail02)) {echo $dpfDetail02;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF３</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type03">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type03" class="input" type="text" name="dpfType03" placeholder="FE82DG" value="<?php if (isset($dpfType03)) {echo $dpfType03;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car03">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car03" class="input" type="text" name="dpfCar03" placeholder="ABC012-3456789" value="<?php if (isset($dpfCar03)) {echo $dpfCar03;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number03">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number03" class="input" name="dpfNumber03" value="<?php if (isset($dpfNumber03)) {echo $dpfNumber03;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail03">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail03" name="dpfDetail03" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($dpfDetail03)) {echo $dpfDetail03;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF４</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type04">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type04" class="input" type="text" name="dpfType04" placeholder="FE82DG" value="<?php if (isset($dpfType04)) {echo $dpfType04;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car04">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car04" class="input" type="text" name="dpfCar04" placeholder="ABC012-3456789" value="<?php if (isset($dpfCar04)) {echo $dpfCar04;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number04">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number04" class="input" name="dpfNumber04" value="<?php if (isset($dpfNumber04)) {echo $dpfNumber04;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail04">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail04" name="dpfDetail04" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($dpfDetail04)) {echo $dpfDetail04;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF５</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type05">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type05" class="input" type="text" name="dpfType05" placeholder="FE82DG" value="<?php if (isset($dpfType05)) {echo $dpfType05;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car05">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car05" class="input" type="text" name="dpfCar05" placeholder="ABC012-3456789" value="<?php if (isset($dpfCar05)) {echo $dpfCar05;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number05">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number05" class="input" name="dpfNumber05" value="<?php if (isset($dpfNumber05)) {echo $dpfNumber05;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail05">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail05" name="dpfDetail05" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($dpfDetail05)) {echo $dpfDetail05;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="block-btn">
              <button id="purchase-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'pages_line/common/footer_line.php'; ?>
  </div>
</body>

</html>
