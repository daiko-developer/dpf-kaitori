<p class="ttl-cmn03">お客様情報</p>
<dl class="list-form-confirm">
  <div class="item">
    <dt class="datattl">お名前</dt>
    <dd class="data"><?php echo $form->name; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">電話番号</dt>
    <dd class="data"><?php echo empty($form->tel)? '-' : $form->tel; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">メールアドレス</dt>
    <dd class="data"><?php echo $form->applicantEmail; ?></dd>
  </div>
</dl>
<p class="ttl-cmn03">マフラー情報</p>
<dl class="list-form-confirm">
  <div class="item">
    <dt class="datattl">車両型式</dt>
    <dd class="data"><?php echo empty($form->dpfType01)? '-' : $form->dpfType01; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">車台番号</dt>
    <dd class="data"><?php echo $form->dpfCar01; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">備考欄</dt>
    <dd class="data"><?php echo empty($form->dpfDetail01)? '-' : $form->dpfDetail01; ?></dd>
  </div>
  <div class="item">
    <dt class="datattl">DPF写真１</dt>
    <dd class="data">
      <img class="pic" src="<?php echo $path; ?>common/components/form/estimate_form_picture01.php" alt="DPF写真１">
    </dd>
  </div>
  <div class="item">
    <dt class="datattl">DPF写真２</dt>
    <dd class="data">
      <img class="pic" src="<?php echo $path; ?>common/components/form/estimate_form_picture02.php" alt="DPF写真２">
    </dd>
  </div>
  <div class="item">
    <dt class="datattl">DPF写真３</dt>
    <dd class="data">
      <img class="pic" src="<?php echo $path; ?>common/components/form/estimate_form_picture03.php" alt="DPF写真３">
    </dd>
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