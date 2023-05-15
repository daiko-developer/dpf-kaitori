<?php
$title = '０秒見積り｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取の０秒見積りページです。';
$keywords = 'DPF買取,ラクラク,便利,０秒見積り';
$is_home = false;
$path = '../../';
include $path .'pages/common/head.php';
?>
</head>

<body>
  <div id="wrapper" class="wrapper home">
    <?php include $path .'pages_line/common/header_line.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <h2 class="ttl ttl-cmn01">どこよりも早く！<br>０秒見積り！</h2>

      <section id="satei" class="home-satei areas">
        <div class="inner900">
          <ul class="list">
            <li class="item">
              <div class="head">車名：</div>
              <select id="car" name="car">
                <option value="0" name="0">選択してください
              </select>
            </li>
            <li class="item">
              <div class="head">エンジン型式：</div>
              <select id="engine" name="engine">
                <option value="">選択してください
              </select>
            </li>
          </ul>
          <div class="block-button"><button id="button-satei" class="button-satei">査定</button></div>
          <div id="satei-price" class="price">
          </div>
        </div>
      </section>
    </main>

    <?php include $path .'pages_line/common/footer_line.php'; ?>
  </div>
  <script src="<?php echo $path; ?>js/price-line.js"></script>
</body>

</html>
