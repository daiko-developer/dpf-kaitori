<form id="purchase-form" class="form" method="POST" action="./" enctype="multipart/form-data">

<?php
  $type = $_GET['type'] ?? '';
  $_SESSION['type'] = $type;
  if ($type == "staff") {
  ?>
  <input type="hidden" name="type" value="<?php echo $type ?>">
  <div class="block">
    <ul class="list01">
      <li class="item01">
        <div class="datattl">
          申込方法<span class="require">必須</span>
        </div>
        <div class="data">
          <input type="radio" value="WEB" id="purchase-form-application-method-web" name="applicationMethod" <?php if (isset($form->formData['applicationMethod']) && $form->formData['applicationMethod'] === "WEB") {echo "checked";} ?> required><label for="purchase-form-application-method-web">WEB</label>
          <input type="radio" value="LINE" id="purchase-form-bank-confirm-line" name="applicationMethod" <?php if (isset($form->formData['applicationMethod']) && $form->formData['applicationMethod'] === "LINE") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-line">LINE</label>
          <input type="radio" value="TEL" id="purchase-form-bank-confirm-tel" name="applicationMethod" <?php if (isset($form->formData['applicationMethod']) && $form->formData['applicationMethod'] === "TEL") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-tel">TEL</label>
          <input type="radio" value="買取依頼書" id="purchase-form-bank-confirm-paper" name="applicationMethod" <?php if (isset($form->formData['applicationMethod']) && $form->formData['applicationMethod'] === "買取依頼書") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-paper">買取依頼書</label>
        </div>
      </li>
    </ul>
  </div>
  <?php
  }
  ?>

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
              <input id="purchase-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($form->formData['name'])) {echo $form->formData['name'];} ?>" required>
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="purchase-form-name-furi">お名前(フリガナ)</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="purchase-form-name-furi" class="input" type="text" name="nameFuri" placeholder="タナカタロウ" value="<?php if (isset($form->formData['nameFuri'])) {echo $form->formData['nameFuri'];} ?>" required>
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
              <input id="purchase-form-company" class="input" type="text" name="company" placeholder="〇〇株式会社" value="<?php if (isset($form->formData['company'])) {echo $form->formData['company'];} ?>">
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="purchase-form-company-furi">会社名(フリガナ)</label>
            </div>
            <div class="data">
              <input id="purchase-form-company-furi" class="input" type="text" name="companyFuri" placeholder="〇〇カブシキガイシャ" value="<?php if (isset($form->formData['companyFuri'])) {echo $form->formData['companyFuri'];} ?>">
            </div>
          </li>
        </ul>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="purchase-form-yubin">郵便番号</label>
        </div>
        <div class="data">
          <input id="purchase-form-yubin" type="text" name="post" class="input -short" placeholder="000-0000" value="<?php if (isset($form->formData['post'])) {echo $form->formData['post'];} ?>" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="purchase-form-address">住所</label>
        </div>
        <div class="data">
          <input id="purchase-form-address" class="input" type="text" name="address" placeholder="〇〇県〇〇市〇〇111-1" value="<?php if (isset($form->formData['address'])) {echo $form->formData['address'];} ?>">
        </div>
      </li>
      <li class="item">
        <ul class="list02">
          <li class="item02">
            <div class="datattl">
              <label for="purchase-form-tel">電話番号</label>
            </div>
            <div class="data">
              <input id="purchase-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($form->formData['tel'])) {echo $form->formData['tel'];} ?>">
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="purchase-form-mail">メールアドレス</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="purchase-form-mail" class="input" type="text" name="applicantEmail" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($form->formData['applicantEmail'])) {echo $form->formData['applicantEmail'];} ?>">
            </div>
          </li>
        </ul>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="purchase-form-picture">本人確認書類(表)</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="purchase-form-picture" type="file" name="picture01" required>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="purchase-form-picture-ura">本人確認書類(裏)</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="purchase-form-picture-ura" type="file" name="picture02" required>
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
              <input id="purchase-form-bank-name" class="input" type="text" name="bank" placeholder="三井住友銀行" value="<?php if (isset($form->formData['bank'])) {echo $form->formData['bank'];} ?>" required>
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="purchase-form-bank-shiten">支店名(店番)</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="purchase-form-bank-shiten" class="input" type="text" name="branch" placeholder="梅田支店" value="<?php if (isset($form->formData['branch'])) {echo $form->formData['branch'];} ?>" required>
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
              <input type="radio" value="普通(総合)" id="purchase-form-bank-type-normal" name="bankType" <?php if (isset($form->formData['bankType']) && $form->formData['bankType'] === "普通(総合)") {echo "checked";} ?> required><label for="purchase-form-bank-type-normal">普通(総合)</label>
              <input type="radio" value="当座" id="purchase-form-bank-type-toza" name="bankType" <?php if (isset($form->formData['bankType']) && $form->formData['bankType'] === "当座") {echo "checked";} ?> required><label for="purchase-form-bank-type-toza">当座</label>
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="purchase-form-bank-number">口座番号</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="purchase-form-bank-number" class="input" type="text" name="bankNumber" placeholder="1234567" value="<?php if (isset($form->formData['bankNumber'])) {echo $form->formData['bankNumber'];} ?>" required>
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
              <input id="purchase-form-bank-user-name" class="input" type="text" name="bankUser" placeholder="タナカタロウ" value="<?php if (isset($form->formData['bankUser'])) {echo $form->formData['bankUser'];} ?>" required>
            </div>
          </li>
        </ul>
      </li>
      <li class="item01">
        <div class="datattl">
          査定金額の確認<span class="require">必須</span>
        </div>
        <div class="data">
          <input type="radio" value="確認する" id="purchase-form-bank-confirm-yes" name="bankConfirm" <?php if (isset($form->formData['bankConfirm']) && $form->formData['bankConfirm'] === "確認する") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-yes">確認する</label>
          <input type="radio" value="確認しない(即入金)" id="purchase-form-bank-confirm-no" name="bankConfirm" <?php if (isset($form->formData['bankConfirm']) && $form->formData['bankConfirm'] === "確認しない(即入金)") {echo "checked";} ?> required><label for="purchase-form-bank-confirm-no">確認しない(即入金)</label>
        </div>
      </li>
    </ul>
  </div>
  <div class="block">
    <div class="head">買取希望DPF</div>
    <ul class="list03">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <li class="item03">
          <div class="datattl">DPF<?= $i; ?></div>
          <ul class="list04">
            <li class="item04">
              <div class="datattl04">
                <label for="purchase-form-type0<?= $i; ?>">車両型式</label><?= $i === 1 ? '<span class="require">必須</span>' : ''; ?>
              </div>
              <div class="data04">
                <input id="purchase-form-type0<?= $i; ?>" class="input" type="text" name="dpfType0<?= $i; ?>" placeholder="FE82DG" value="<?php if (isset($form->dataForm['dpfType' . $i])) {echo $form->dataForm['dpfType' . $i];} ?>" <?= $i === 1 ? 'required' : ''; ?>>
              </div>
            </li>
            <li class="item04">
              <div class="datattl04">
                <label for="purchase-form-car0<?= $i; ?>">車台番号</label><?= $i === 1 ? '<span class="require">必須</span>' : ''; ?>
              </div>
              <div class="data04">
                <input id="purchase-form-car0<?= $i; ?>" class="input" type="text" name="dpfCar0<?= $i; ?>" placeholder="ABC012-3456789" value="<?php if (isset($form->dataForm['dpfCar' . $i])) {echo $form->dataForm['dpfCar' . $i];} ?>" <?= $i === 1 ? 'required' : ''; ?>>
              </div>
            </li>
            <li class="item04">
              <div class="datattl04">
                <label for="purchase-form-number0<?= $i; ?>">数量</label><?= $i === 1 ? '<span class="require">必須</span>' : ''; ?>
              </div>
              <div class="data04">
                <input type="number" id="purchase-form-number0<?= $i; ?>" class="input" name="dpfNumber0<?= $i; ?>" value="<?php if (isset($form->dataForm['dpfNumber' . $i])) {echo $form->dataForm['dpfNumber' . $i];} ?>" <?= $i === 1 ? 'required' : ''; ?>>
              </div>
            </li>
            <li class="item04 -fullsize">
              <div class="datattl04">
                <label for="purchase-form-detail0<?= $i; ?>">備考欄<br>(商品状態)</label>
              </div>
              <div class="data04">
                <textarea id="purchase-form-detail0<?= $i; ?>" name="dpfDetail0<?= $i; ?>" placeholder="オイル漏れ、欠陥部品がある等"><?= isset($form->dataForm['dpfDetail' . $i]) ? $form->dataForm['dpfDetail' . $i] : ''; ?></textarea>
              </div>
            </li>
          </ul>
        </li>
      <?php endfor; ?>
    </ul>
  </div>
  <div class="block-btn">
    <button id="purchase-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
  </div>
</form>