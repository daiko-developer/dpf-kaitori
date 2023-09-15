<?php
// フォーム処理
require_once '../../feature/form/entities/estimate_form.php';
$form = new EstimateForm(applicationMethod: 'LINE');
include_once '../../feature/form/do_tasks_for_form.php';
?>

<?php
// head内容
$title = 'DPF写真お見積り｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積りページです。';
$keywords = 'DPF買取,ラクラク,便利,DPF写真お見積り';
$is_home = false;
$path = '../../';
include_once $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate-form">
    <?php include_once $path .'common/components/header_mini.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl-cmn01-line">写真お見積り</h2>

      <section class="areas">
        <div class="inner1500">
          <?php include_once $path .'common/components/form/estimate_form.php'; ?>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer_mini.php'; ?>
  </div>
</body>

</html>
