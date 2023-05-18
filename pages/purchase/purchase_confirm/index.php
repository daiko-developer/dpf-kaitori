<?php
// フォーム処理
require_once '../../../feature/form/entities/purchase_form.php';
$form = new PurchaseForm;
include_once '../../../feature/form/do_tasks_for_form_confirm.php';
?>

<?php
// head内容
$title = 'DPF買取申込み確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF買取申込確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,買取申込確認';
$is_home = false;
$path = '../../../';
include $path .'pages/common/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase_confirm">
    <?php include $path .'pages/common/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">買取申込み</h2>
      </div>

      <section class="areas">
        <div class="inner">
          <h3 class="ttl ttl-cmn02">申込み内容確認</h3>
          <h4 class="ttl-cmn03">お客様情報</h4>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">お名前</dt>
              <dd class="data"><?php echo $form->name; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">お名前(フリガナ)</dt>
              <dd class="data"><?php echo $form->nameFuri; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">会社名</dt>
              <dd class="data"><?php echo empty($form->company)? '-' : $form->company; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">会社名(フリガナ)</dt>
              <dd class="data"><?php echo empty($form->companyFuri)? '-' : $form->companyFuri; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">郵便番号</dt>
              <dd class="data"><?php echo empty($form->post)? '-' : $form->post; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">住所</dt>
              <dd class="data"><?php echo empty($form->address)? '-' : $form->address; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">電話番号</dt>
              <dd class="data"><?php echo empty($form->tel)? '-' : $form->tel; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">メールアドレス</dt>
              <dd class="data"><?php echo $form->applicantEmail; ?></dd>
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
          <h4 class="ttl-cmn03">振り込み先情報</h4>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">金融機関名</dt>
              <dd class="data"><?php echo $form->bank; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">支店名(店番)</dt>
              <dd class="data"><?php echo $form->branch; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">種別</dt>
              <dd class="data"><?php echo $form->bankType; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">口座番号</dt>
              <dd class="data"><?php echo $form->bankNumber; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">口座名義人(カタカナ)</dt>
              <dd class="data"><?php echo $form->bankUser; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">査定金額の確認</dt>
              <dd class="data"><?php echo $form->bankConfirm; ?></dd>
            </div>
          </dl>
          <h4 class="ttl-cmn03">買取希望マフラー</h4>
          <dl class="list-form-confirm">
            <dt class="head">マフラー１</dt>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($form->dpfType01)? '-' : $form->dpfType01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車台番号</dt>
              <dd class="data"><?php echo $form->dpfCar01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo $form->dpfNumber01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->dpfDetail01)? '-' : $form->dpfDetail01; ?></dd>
            </div>
            <dt class="head">マフラー２</dt>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($form->dpfType02)? '-' : $form->dpfType02; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車台番号</dt>
              <dd class="data"><?php echo empty($form->dpfCar02)? '-' : $form->dpfCar02; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($form->dpfNumber02)? '-' : $form->dpfNumber02; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->dpfDetail02)? '-' : $form->dpfDetail02; ?></dd>
            </div>
            <dt class="head">マフラー３</dt>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($form->dpfType03)? '-' : $form->dpfType03; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車台番号</dt>
              <dd class="data"><?php echo empty($form->dpfCar03)? '-' : $form->dpfCar03; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($form->dpfNumber03)? '-' : $form->dpfNumber03; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->dpfDetail03)? '-' : $form->dpfDetail03; ?></dd>
            </div>
            <dt class="head">マフラー４</dt>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($form->dpfType04)? '-' : $form->dpfType04; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車台番号</dt>
              <dd class="data"><?php echo empty($form->dpfCar04)? '-' : $form->dpfCar04; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($form->dpfNumber04)? '-' : $form->dpfNumber04; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->dpfDetail04)? '-' : $form->dpfDetail04; ?></dd>
            </div>
            <dt class="head">マフラー５</dt>
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($form->dpfType05)? '-' : $form->dpfType05; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車台番号</dt>
              <dd class="data"><?php echo empty($form->dpfCar05)? '-' : $form->dpfCar05; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">数量</dt>
              <dd class="data"><?php echo empty($form->dpfNumber05)? '-' : $form->dpfNumber05; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->dpfDetail05)? '-' : $form->dpfDetail05; ?></dd>
            </div>
          </dl>
          <p class="tac">こちらの内容で送信してもよろしいですか？</p>
          <form class="form" method="post" action="../purchase_send/">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="block-btn">
              <a class="btn btn-cmn01" href="../?action=edit">戻る</a>
              <button class="btn btn-cmn01" type="submit" value="送信">送信</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'pages/common/footer.php'; ?>
  </div>
</body>

</html>
