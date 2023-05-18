<?php
// フォーム処理
require_once '../../../feature/form/entities/purchase_form.php';
$form = new PurchaseForm;
include_once '../../../feature/form/do_tasks_for_form_confirm.php';
?>

<?php
$title = 'DPF買取申込み確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF買取申込確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,買取申込確認';
$is_home = false;
$path = '../../../';
include_once $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase_confirm">
    <?php include_once $path .'common/components/header_mini.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">申込内容確認</h2>

      <section class="areas">
        <div class="inner">
          <?php include_once $path .'common/components/form/purchase_form_confirm.php'; ?>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer_mini.php'; ?>
  </div>
</body>

</html>
