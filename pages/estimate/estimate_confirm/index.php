<?php
// フォーム処理
require_once '../../../feature/form/entities/estimate_form.php';
$form = new EstimateForm;
include_once '../../../feature/form/do_tasks_for_form_confirm.php';
?>

<?php
// head内容
$title = 'DPF写真お見積り確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積り確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,DPF写真お見積り確認';
$is_home = false;
$path = '../../../';
include $path .'pages/common/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate_confirm">
    <?php include $path .'pages/common/header.php'; ?>

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
              <dd class="data"><?php echo $form->name; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">電話番号</dt>
              <dd class="data"><?php echo empty($form->tel)? '-' : $form->tel; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">メールアドレス</dt>
              <dd class="data"><?php echo $form->applicantEmail; ?></dd>
            </div>
          </dl>
          <h4 class="ttl-cmn03">マフラー情報</h4>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">車両型式</dt>
              <dd class="data"><?php echo empty($form->dpfType01)? '-' : $form->dpfType01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">車台番号</dt>
              <dd class="data"><?php echo $form->dpfCar01; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->dpfDetail01)? '-' : $form->dpfDetail01; ?></dd>
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
          <form class="form" method="post" action="../estimate_send/">
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
