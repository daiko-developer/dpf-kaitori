<?php
// フォーム処理
require_once '../../feature/form/entities/contact_form.php';
$form = new ContactForm;
include_once '../../feature/form/do_tasks_for_form.php';
?>

<?php
// head内容
$title = 'お問い合わせ｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のお問い合わせページです。';
$keywords = 'DPF買取,ラクラク,便利,お問い合わせ';
$is_home = false;
$path = '../../';
include_once $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under contact-form">
    <?php include $path .'common/components/header.php'; ?>

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
                        <input id="contact-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($form->name)) {echo $form->name;} ?>" required>
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
                        <input id="contact-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($form->tel)) {echo $form->tel;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="contact-form-mail">メールアドレス</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="contact-form-mail" class="input" type="text" name="applicantEmail" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($form->applicantEmail)) {echo $form->applicantEmail;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01 -fullsize">
                  <div class="datattl">
                    <label for="contact-form-detail">お問い合わせ内容</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <textarea id="contact-form-detail" name="detail" placeholder="" value="<?php if (isset($form->detail)) {echo $form->detail;} ?>" required></textarea>
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

    <?php include $path .'common/components/footer.php'; ?>
  </div>
</body>

</html>
