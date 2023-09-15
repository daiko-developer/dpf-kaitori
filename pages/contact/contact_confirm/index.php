<?php
// フォーム処理
require_once '../../../feature/form/entities/contact_form.php';
$form = new ContactForm;
include_once '../../../feature/form/do_tasks_for_form_confirm.php';
?>

<?php
// head内容
$title = 'お問い合わせ内容確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のお問い合わせ内容確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,お問い合わせ内容確認';
$is_home = false;
$path = '../../../';
include $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under contact_confirm">
    <?php include $path .'common/components/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">お問い合わせ</h2>
      </div>

      <section class="areas">
        <div class="inner">
          <h3 class="ttl ttl-cmn02">お問い合わせ内容確認</h3>
          <dl class="list-form-confirm">
            <div class="item">
              <dt class="datattl">お名前</dt>
              <dd class="data"><?php echo $form->formData['name']; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">電話番号</dt>
              <dd class="data"><?php echo empty($form->formData['tel'])? '-' : $form->formData['tel']; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">メールアドレス</dt>
              <dd class="data"><?php echo $form->formData['applicantEmail']; ?></dd>
            </div>
            <div class="item">
              <dt class="datattl">備考欄</dt>
              <dd class="data"><?php echo empty($form->formData['detail'])? '-' : $form->formData['detail']; ?></dd>
            </div>
          </dl>
          <p class="tac">こちらの内容で送信してもよろしいですか？</p>
          <form class="form" method="post" action="../contact_send/">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="block-btn">
              <a class="btn btn-cmn01" href="../?action=edit">戻る</a>
              <button class="btn btn-cmn01" type="submit" value="送信">送信</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'common/components/footer.php'; ?>
  </div>
</body>

</html>
