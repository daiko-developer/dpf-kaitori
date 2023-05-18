<?php
// フォーム処理
require_once '../../../feature/form/entities/contact_form.php';
$form = new ContactForm;
include_once '../../../feature/form/do_tasks_for_form_send.php';
?>

<?php
// head内容
$title = 'お問い合わせ完了｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のお問い合わせ完了ページです。';
$keywords = 'DPF買取,ラクラク,便利,お問い合わせ完了';
$is_home = false;
$path = '../../../';
include $path .'pages/common/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under contact-send">
    <?php include $path .'pages/common/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <section class="area">
        <div class="inner">
          <h2 class="ttl ttl-cmn01">お問い合わせ完了</h2>
          <?php
            if($message !== ""){
              echo $message;
            }
          ?>
          <a href="../">TOPに戻る</a>
        </div>
      </section>
    </main>

    <?php include $path .'pages/common/footer.php'; ?>
  </div>
</body>

</html>
