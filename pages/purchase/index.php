<?php
// フォーム処理
require_once '../../feature/form/entities/purchase_form.php';
$form = new PurchaseForm(applicationMethod: 'WEB');
include_once '../../feature/form/do_tasks_for_form.php';
?>

<?php
// head内容
$title = 'DPF買取申込｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取の買取申込ページです。';
$keywords = 'DPF買取,ラクラク,便利,買取申込';
$is_home = false;
$path = '../../';
include_once $path .'common/components/head.php';
?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase_form">
    <?php include_once $path .'common/components/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">買取申込</h2>
      </div>

      <section class="areas">
        <div class="inner1500">
          <?php include_once $path .'common/components/form/purchase_form.php'; ?>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer.php'; ?>
  </div>
</body>

</html>
