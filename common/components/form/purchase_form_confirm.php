<?php
$type = $form->formData['type'];
if ($type == "staff") {
?>
<dl class="list-form-confirm">
  <div class="item">
    <dt class="datattl">申込方法</dt>
    <dd class="data"><?php echo $form->formData['applicationMethod']; ?></dd>
  </div>
</dl>
<?php
}
?>

<p class="ttl-cmn03">お客様情報</p>
<dl class="list-form-confirm">
  <div class="item">
    <dt class="datattl">お名前</dt>
    <dd class="data"><?php echo $form->formData['name']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">お名前(フリガナ)</dt>
    <dd class="data"><?php echo $form->formData['nameFuri']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">会社名</dt>
    <dd class="data"><?php echo empty($form->formData['company'])? '-' : $form->formData['company']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">会社名(フリガナ)</dt>
    <dd class="data"><?php echo empty($form->formData['companyFuri'])? '-' : $form->formData['companyFuri']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">郵便番号</dt>
    <dd class="data"><?php echo empty($form->formData['post'])? '-' : $form->formData['post']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">住所</dt>
    <dd class="data"><?php echo empty($form->formData['address'])? '-' : $form->formData['address']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">電話番号</dt>
    <dd class="data"><?php echo empty($form->formData['tel'])? '-' : $form->formData['tel']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">メールアドレス</dt>
    <dd class="data"><?php echo $form->formData['applicantEmail']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">証明写真(表)</dt>
    <dd class="data">
      <img class="pic" src="<?php echo $path; ?>common/components/form/purchase_form_picture01.php" alt="証明写真(表)">
    </dd>
  </div>
  <div class="item">
    <dt class="datattl">証明写真(裏)</dt>
    <dd class="data">
      <img class="pic" src="<?php echo $path; ?>common/components/form/purchase_form_picture02.php" alt="証明写真(裏)">
    </dd>
  </div>
</dl>
<p class="ttl-cmn03">振り込み先情報</p>
<dl class="list-form-confirm">
  <div class="item">
    <dt class="datattl">金融機関名</dt>
    <dd class="data"><?php echo $form->formData['bank']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">支店名(店番)</dt>
    <dd class="data"><?php echo $form->formData['branch']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">種別</dt>
    <dd class="data"><?php echo $form->formData['bankType']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">口座番号</dt>
    <dd class="data"><?php echo $form->formData['bankNumber']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">口座名義人(カタカナ)</dt>
    <dd class="data"><?php echo $form->formData['bankUser']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">査定金額の確認</dt>
    <dd class="data"><?php echo $form->formData['bankConfirm']; ?></dd>
  </div>
</dl>
<p class="ttl-cmn03">買取希望マフラー</p>
<dl class="list-form-confirm">
  <dt class="head">マフラー１</dt>
  <div class="item">
    <dt class="datattl">車両型式</dt>
    <dd class="data"><?php echo empty($form->formData['dpfType01'])? '-' : $form->formData['dpfType01']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">車台番号</dt>
    <dd class="data"><?php echo $form->formData['dpfCar01']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">数量</dt>
    <dd class="data"><?php echo $form->formData['dpfNumber01']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">備考欄</dt>
    <dd class="data"><?php echo empty($form->formData['dpfDetail01'])? '-' : $form->formData['dpfDetail01']; ?></dd>
  </div>
  <dt class="head">マフラー２</dt>
  <div class="item">
    <dt class="datattl">車両型式</dt>
    <dd class="data"><?php echo empty($form->formData['dpfType02'])? '-' : $form->formData['dpfType02']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">車台番号</dt>
    <dd class="data"><?php echo empty($form->formData['dpfCar02'])? '-' : $form->formData['dpfCar02']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">数量</dt>
    <dd class="data"><?php echo empty($form->formData['dpfNumber02'])? '-' : $form->formData['dpfNumber02']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">備考欄</dt>
    <dd class="data"><?php echo empty($form->formData['dpfDetail02'])? '-' : $form->formData['dpfDetail02']; ?></dd>
  </div>
  <dt class="head">マフラー３</dt>
  <div class="item">
    <dt class="datattl">車両型式</dt>
    <dd class="data"><?php echo empty($form->formData['dpfType03'])? '-' : $form->formData['dpfType03']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">車台番号</dt>
    <dd class="data"><?php echo empty($form->formData['dpfCar03'])? '-' : $form->formData['dpfCar03']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">数量</dt>
    <dd class="data"><?php echo empty($form->formData['dpfNumber03'])? '-' : $form->formData['dpfNumber03']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">備考欄</dt>
    <dd class="data"><?php echo empty($form->formData['dpfDetail03'])? '-' : $form->formData['dpfDetail03']; ?></dd>
  </div>
  <dt class="head">マフラー４</dt>
  <div class="item">
    <dt class="datattl">車両型式</dt>
    <dd class="data"><?php echo empty($form->formData['dpfType04'])? '-' : $form->formData['dpfType04']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">車台番号</dt>
    <dd class="data"><?php echo empty($form->formData['dpfCar04'])? '-' : $form->formData['dpfCar04']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">数量</dt>
    <dd class="data"><?php echo empty($form->formData['dpfNumber04'])? '-' : $form->formData['dpfNumber04']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">備考欄</dt>
    <dd class="data"><?php echo empty($form->formData['dpfDetail04'])? '-' : $form->formData['dpfDetail04']; ?></dd>
  </div>
  <dt class="head">マフラー５</dt>
  <div class="item">
    <dt class="datattl">車両型式</dt>
    <dd class="data"><?php echo empty($form->formData['dpfType05'])? '-' : $form->formData['dpfType05']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">車台番号</dt>
    <dd class="data"><?php echo empty($form->formData['dpfCar05'])? '-' : $form->formData['dpfCar05']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">数量</dt>
    <dd class="data"><?php echo empty($form->formData['dpfNumber05'])? '-' : $form->formData['dpfNumber05']; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">備考欄</dt>
    <dd class="data"><?php echo empty($form->formData['dpfDetail05'])? '-' : $form->formData['dpfDetail05']; ?></dd>
  </div>
</dl>
<p class="tac">こちらの内容で送信してもよろしいですか？</p>
<form class="form" method="post" action="../<?php echo $form->sendPage; ?>/">
  <input type="hidden" name="token" value="<?php echo $token ?>">
  <div class="block-btn">
    <a class="btn btn-cmn01" href="../?action=edit">戻る</a>
    <button class="btn btn-cmn01" type="submit" value="送信">送信</button>
  </div>
</form>