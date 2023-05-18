<?php
$title = '０秒見積り｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取の０秒見積りページです。';
$keywords = 'DPF買取,ラクラク,便利,０秒見積り';
$is_home = false;
$path = '../../';
include_once $path .'common/components/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper home">
    <?php include_once $path .'common/components/header_mini.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl ttl-cmn01">どこよりも早く！<br>０秒見積り！</h2>

      <section id="satei" class="home-satei areas">
        <div class="inner900">
          <?php include_once $path .'common/components/zero_estimate.php'; ?>
          <div class="txt">上記の選択肢に無い場合や、より詳細なお見積りをご希望の方は<br>写真お見積りをご利用ください。</div>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer_mini.php'; ?>
  </div>
  <script src="<?php echo $path; ?>js/price-line.js"></script>
</body>

</html>
