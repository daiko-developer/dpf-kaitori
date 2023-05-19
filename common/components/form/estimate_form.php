<form id="estimate-form" class="form" method="POST" action="./" enctype="multipart/form-data">
  <div class="block">
    <div class="head">お客様情報</div>
    <ul class="list01">
      <li class="item">
        <ul class="list02">
          <li class="item02">
            <div class="datattl">
              <label for="estimate-form-name">お名前</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="estimate-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($form->name)) {echo $form->name;} ?>" required>
            </div>
          </li>
        </ul>
      </li>
      <li class="item">
        <ul class="list02">
          <li class="item02">
            <div class="datattl">
              <label for="estimate-form-tel">電話番号</label>
            </div>
            <div class="data">
              <input id="estimate-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($form->tel)) {echo $form->tel;} ?>">
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="estimate-form-mail">メールアドレス</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="estimate-form-mail" class="input" type="text" name="applicantEmail" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($form->applicantEmail)) {echo $form->applicantEmail;} ?>">
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="block">
    <div class="head">DPF情報</div>
    <ul class="list01">
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-type01">車両型式</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-type01" class="input" type="text" name="dpfType01" placeholder="FE82DG" value="<?php if (isset($form->dpfType01)) {echo $form->dpfType01;} ?>" required>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-car01">車台番号</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-car01" class="input" type="text" name="dpfCar01" placeholder="ABC012-3456789" value="<?php if (isset($form->dpfCar01)) {echo $form->dpfCar01;} ?>" required>
        </div>
      </li>
      <li class="item01 -fullsize">
        <div class="datattl">
          <label for="estimate-form-detail01">備考欄</label>
        </div>
        <div class="data">
          <textarea id="estimate-form-detail01" name="dpfDetail01" placeholder="オイル漏れ、欠陥部品がある等" value="<?php if (isset($form->dpfDetail01)) {echo $form->dpfDetail01;} ?>"></textarea>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-picture01">DPF全体の写真</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-picture01" type="file" name="picture01" value="<?php if (isset($form->picture01)) {echo $form->picture01;} ?>" required>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-picture02">DPFフィルター部分の写真</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-picture02" type="file" name="picture02" value="<?php if (isset($form->picture02)) {echo $form->picture02;} ?>" required>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-picture03">DPF出口側の写真</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-picture03" type="file" name="picture03" value="<?php if (isset($form->picture03)) {echo $form->picture03;} ?>" required>
        </div>
      </li>
    </ul>
  </div>
  <div class="block-btn">
    <button id="estimate-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
  </div>
</form>