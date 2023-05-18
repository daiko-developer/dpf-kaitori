<?php
// フォーム処理
require_once '../../../feature/form/entities/estimate_form.php';
$form = new EstimateForm;
include_once '../../../feature/form/do_tasks_for_form_send.php';
?>

<?php
$title = 'DPF写真お見積り完了｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取のDPF写真お見積り完了ページです。';
$keywords = 'DPF買取,ラクラク,便利,DPF写真お見積り完了';
$is_home = false;
$path = '../../../';
include_once $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper under estimate-send">
    <?php include_once $path .'common/components/header_mini.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <section class="area">
        <div class="inner">
          <h2 class="ttl ttl-cmn01">写真見積り完了</h2>
          <?php
            if($message !== ""){
              echo $message;
            }
          ?>
          <p class="txt">ブラウザを閉じてください</p>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer_mini.php'; ?>
  </div>
</body>

</html>
