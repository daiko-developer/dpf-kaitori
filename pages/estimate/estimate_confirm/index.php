<?php
// フォーム処理
require_once '../../../feature/form/entities/estimate_form.php';
$form = new EstimateForm(applicationMethod: 'WEB');
include_once '../../../feature/form/do_tasks_for_form_confirm.php';
?>

<?php
// head内容
$title = 'DPF写真お見積り確認｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積り確認ページです。';
$keywords = 'DPF買取,ラクラク,便利,DPF写真お見積り確認';
$is_home = false;
$path = '../../../';
include_once $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate_confirm">
    <?php include_once $path .'common/components/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">DPF写真お見積り</h2>
      </div>

      <section class="areas">
        <div class="inner">
          <h3 class="ttl ttl-cmn02">DPF写真お見積り確認</h3>
          <?php include_once $path .'common/components/form/estimate_form_confirm.php'; ?>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer.php'; ?>
  </div>
</body>

</html>
