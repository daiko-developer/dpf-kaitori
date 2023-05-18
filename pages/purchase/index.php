<?php
// フォーム処理
require_once '../../feature/form/entities/purchase_form.php';
$form = new PurchaseForm;
include_once '../../feature/form/do_tasks_for_form.php';
?>

<?php
// head内容
$title = 'DPF買取申込｜カンタンでどこよりも便利なDPFラクラク買取';
$description = 'カンタンでどこよりも便利なDPFラクラク買取の買取申込ページです。';
$keywords = 'DPF買取,ラクラク,便利,買取申込';
$is_home = false;
$path = '../../';
include $path .'pages/common/head.php';
?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>

<body>
  <div id="wrapper" class="wrapper under purchase_form">
    <?php include $path .'pages/common/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="topvisual">
        <h2 class="ttl">買取申込</h2>
      </div>

      <section class="areas">
        <div class="inner1500">
          <form id="purchase-form" class="form" method="POST" action="./" enctype="multipart/form-data">
            <div class="block">
              <div class="head">お客様情報</div>
              <ul class="list01">
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-name">お名前</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($form->name)) {echo $form->name;} ?>" required>
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-name-furi">お名前(フリガナ)</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-name-furi" class="input" type="text" name="nameFuri" placeholder="タナカタロウ" value="<?php if (isset($form->nameFuri)) {echo $form->nameFuri;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-company">会社名</label>
                      </div>
                      <div class="data">
                        <input id="purchase-form-company" class="input" type="text" name="company" placeholder="〇〇株式会社" value="<?php if (isset($form->company)) {echo $form->company;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-company-furi">会社名(フリガナ)</label>
                      </div>
                      <div class="data">
                        <input id="purchase-form-company-furi" class="input" type="text" name="companyFuri" placeholder="〇〇カブシキガイシャ" value="<?php if (isset($form->companyFuri)) {echo $form->companyFuri;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-yubin">郵便番号</label>
                  </div>
                  <div class="data">
                    <input id="purchase-form-yubin" type="text" name="post" class="input -short" placeholder="000-0000" value="<?php if (isset($form->post)) {echo $form->post;} ?>" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-address">住所</label>
                  </div>
                  <div class="data">
                    <input id="purchase-form-address" class="input" type="text" name="address" placeholder="〇〇県〇〇市〇〇111-1" value="<?php if (isset($form->address)) {echo $form->address;} ?>">
                  </div>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-tel">電話番号</label>
                      </div>
                      <div class="data">
                        <input id="purchase-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($form->tel)) {echo $form->tel;} ?>">
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-mail">メールアドレス</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-mail" class="input" type="text" name="applicantEmail" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($form->applicantEmail)) {echo $form->applicantEmail;} ?>">
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-picture">本人確認書類(表)</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="purchase-form-picture" type="file" name="picture" value="<?php if (isset($form->picture)) {echo $form->picture;} ?>" required>
                  </div>
                </li>
                <li class="item01">
                  <div class="datattl">
                    <label for="purchase-form-picture-ura">本人確認書類(裏)</label><span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input id="purchase-form-picture-ura" type="file" name="pictureUra" value="<?php if (isset($form->pictureUra)) {echo $form->pictureUra;} ?>" required>
                  </div>
                </li>
                <li class="item01">
                  <p class="txt">
                    本人確認書類<br>
                    運転免許証/健康保険証/パスポート/住民票/年金手帳など
                  </p>
                </li>
              </ul>
            </div>
            <div class="block">
              <div class="head">振り込み先情報</div>
              <ul class="list01">
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-name">金融機関名</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-name" class="input" type="text" name="bank" placeholder="三井住友銀行" value="<?php if (isset($form->bank)) {echo $form->bank;} ?>" required>
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-shiten">支店名(店番)</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-shiten" class="input" type="text" name="branch" placeholder="梅田支店" value="<?php if (isset($form->branch)) {echo $form->branch;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        種別<span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input type="radio" value="普通(総合)" id="purchase-form-bank-type-normal" name="bankType" <?php if (isset($form->bankType) && $form->bankType === "普通(総合)") {echo "checked";} ?> required><label for="purchase-form-bank-type-normal">普通(総合)</label>
                        <input type="radio" value="当座" id="purchase-form-bank-type-toza" name="bankType" <?php if (isset($form->bankType) && $form->bankType === "当座") {echo "checked";} ?> required><label for="purchase-form-bank-type-toza">当座</label>
                      </div>
                    </li>
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-number">口座番号</label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-number" class="input" type="text" name="bankNumber" placeholder="1234567" value="<?php if (isset($form->bankNumber)) {echo $form->bankNumber;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item">
                  <ul class="list02">
                    <li class="item02">
                      <div class="datattl">
                        <label for="purchase-form-bank-user-name">口座名義人<span class="ttlin">(カタカナ)</span></label><span class="require">必須</span>
                      </div>
                      <div class="data">
                        <input id="purchase-form-bank-user-name" class="input" type="text" name="bankUser" placeholder="タナカタロウ" value="<?php if (isset($form->bankUser)) {echo $form->bankUser;} ?>" required>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item01">
                  <div class="datattl">
                    査定金額の確認<span class="require">必須</span>
                  </div>
                  <div class="data">
                    <input type="radio" value="確認する" id="purchase-form-bank-confirm-yes" name="bankConfirm" <?php if (isset($form->bankConfirm) && $form->bankConfirm === "確認する") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-yes">確認する</label>
                    <input type="radio" value="確認しない(即入金)" id="purchase-form-bank-confirm-no" name="bankConfirm" <?php if (isset($form->bankConfirm) && $form->bankConfirm === "確認しない(即入金)") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-no">確認しない(即入金)</label>
                  </div>
                </li>
              </ul>
            </div>
            <div class="block">
              <div class="head">買取希望DPF</div>
              <ul class="list03">
                <li class="item03">
                  <div class="datattl">DPF１</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type01">車両型式</label><span class="require">必須</span>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type01" class="input" type="text" name="dpfType01" placeholder="FE82DG" value="<?php if (isset($form->dpfType01)) {echo $form->dpfType01;} ?>" required>
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car01">車台番号</label><span class="require">必須</span>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car01" class="input" type="text" name="dpfCar01" placeholder="ABC012-3456789" value="<?php if (isset($form->dpfCar01)) {echo $form->dpfCar01;} ?>" required>
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number01">数量</label><span class="require">必須</span>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number01" class="input" name="dpfNumber01" value="<?php if (isset($form->dpfNumber01)) {echo $form->dpfNumber01;} ?>" required>
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail01">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail01" name="dpfDetail01" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($form->dpfDetail01)) {echo $form->dpfDetail01;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF２</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type02">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type02" class="input" type="text" name="dpfType02" placeholder="FE82DG" value="<?php if (isset($form->dpfType02)) {echo $form->dpfType02;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car02">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car02" class="input" type="text" name="dpfCar02" placeholder="ABC012-3456789" value="<?php if (isset($form->dpfCar02)) {echo $form->dpfCar02;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number02">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number02" class="input" name="dpfNumber02" value="<?php if (isset($form->dpfNumber02)) {echo $form->dpfNumber02;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail02">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail02" name="dpfDetail02" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($form->dpfDetail02)) {echo $form->dpfDetail02;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF３</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type03">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type03" class="input" type="text" name="dpfType03" placeholder="FE82DG" value="<?php if (isset($form->dpfType03)) {echo $form->dpfType03;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car03">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car03" class="input" type="text" name="dpfCar03" placeholder="ABC012-3456789" value="<?php if (isset($form->dpfCar03)) {echo $form->dpfCar03;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number03">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number03" class="input" name="dpfNumber03" value="<?php if (isset($form->dpfNumber03)) {echo $form->dpfNumber03;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail03">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail03" name="dpfDetail03" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($form->dpfDetail03)) {echo $form->dpfDetail03;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF４</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type04">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type04" class="input" type="text" name="dpfType04" placeholder="FE82DG" value="<?php if (isset($form->dpfType04)) {echo $form->dpfType04;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car04">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car04" class="input" type="text" name="dpfCar04" placeholder="ABC012-3456789" value="<?php if (isset($form->dpfCar04)) {echo $form->dpfCar04;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number04">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number04" class="input" name="dpfNumber04" value="<?php if (isset($form->dpfNumber04)) {echo $form->dpfNumber04;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail04">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail04" name="dpfDetail04" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($form->dpfDetail04)) {echo $form->dpfDetail04;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="item03">
                  <div class="datattl">DPF５</div>
                  <ul class="list04">
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-type05">車両型式</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-type05" class="input" type="text" name="dpfType05" placeholder="FE82DG" value="<?php if (isset($form->dpfType05)) {echo $form->dpfType05;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-car05">車台番号</label>
                      </div>
                      <div class="data04">
                        <input id="purchase-form-car05" class="input" type="text" name="dpfCar05" placeholder="ABC012-3456789" value="<?php if (isset($form->dpfCar05)) {echo $form->dpfCar05;} ?>">
                      </div>
                    </li>
                    <li class="item04">
                      <div class="datattl04">
                        <label for="purchase-form-number05">数量</label>
                      </div>
                      <div class="data04">
                        <input type="number" id="purchase-form-number05" class="input" name="dpfNumber05" value="<?php if (isset($form->dpfNumber05)) {echo $form->dpfNumber05;} ?>">
                      </div>
                    </li>
                    <li class="item04 -fullsize">
                      <div class="datattl04">
                        <label for="purchase-form-detail05">備考欄<br>(商品状態)</label>
                      </div>
                      <div class="data04">
                        <textarea id="purchase-form-detail05" name="dpfDetail05" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($form->dpfDetail05)) {echo $form->dpfDetail05;} ?>"></textarea>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="block-btn">
              <button id="purchase-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php include $path .'pages/common/footer.php'; ?>
  </div>
</body>

</html>
