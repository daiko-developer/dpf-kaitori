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
              <input id="estimate-form-name" class="input" type="text" name="name" placeholder="田中太郎" value="<?php if (isset($form->formData['name'])) {echo $form->formData['name'];} ?>" required>
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
              <input id="estimate-form-tel" class="input" type="text" name="tel" placeholder="000-0000-0000" value="<?php if (isset($form->formData['tel'])) {echo $form->formData['tel'];} ?>">
            </div>
          </li>
          <li class="item02">
            <div class="datattl">
              <label for="estimate-form-mail">メールアドレス</label><span class="require">必須</span>
            </div>
            <div class="data">
              <input id="estimate-form-mail" class="input" type="text" name="applicantEmail" required pattern="[\w\-._]+@[\w\-._]+\.[A-Za-z]+" placeholder="abc@gmail.com" value="<?php if (isset($form->formData['applicantEmail'])) {echo $form->formData['applicantEmail'];} ?>">
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
          <input id="estimate-form-type01" class="input" type="text" name="dpfType01" placeholder="FE82DG" value="<?php if (isset($form->formData['dpfType01'])) {echo $form->formData['dpfType01'];} ?>" required>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-car01">車台番号</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-car01" class="input" type="text" name="dpfCar01" placeholder="ABC012-3456789" value="<?php if (isset($form->formData['dpfCar01'])) {echo $form->formData['dpfCar01'];} ?>" required>
          <p class="txt">※車両型式、車台番号は車検証を御覧ください</p>
          <div class="block-img">
            <div class="img -large"><img src="<?php echo $path; ?>images/estimate/img07.png" alt=""></div>
          </div>
        </div>
      </li>
      <li class="item01 -fullsize">
        <div class="datattl">
          <label for="estimate-form-detail01">備考欄</label>
        </div>
        <div class="data">
          <textarea id="estimate-form-detail01" name="dpfDetail01" placeholder="オイル漏れ、欠陥部品がある等"><?php if (isset($form->formData['dpfDetail01'])) {echo $form->formData['dpfDetail01'];} ?></textarea>

        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-picture01">DPF全体の写真</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-picture01" class="file" type="file" name="picture01" required>
          <p class="txt">※全体が見えるように撮影してください</p>
          <div class="block-img">
            <div class="img -good"><img src="<?php echo $path; ?>images/estimate/img01.jpeg" alt=""></div>
            <div class="img -bad"><img src="<?php echo $path; ?>images/estimate/img02.jpeg" alt=""></div>
          </div>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-picture02">DPFフィルター部分の写真</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-picture02" class="file" type="file" name="picture02" required>
          <p class="txt">※フィルター部分全体が見えるように撮影してください</p>
          <div class="block-img">
            <div class="img -good"><img src="<?php echo $path; ?>images/estimate/img03.jpeg" alt=""></div>
            <div class="img -bad"><img src="<?php echo $path; ?>images/estimate/img04.jpeg" alt=""></div>
          </div>
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-picture03">DPF出口側の写真</label><span class="require">必須</span>
        </div>
        <div class="data">
          <input id="estimate-form-picture03" class="file" type="file" name="picture03" required>
          <p class="txt">※出口部分全体が見えるように撮影してください</p>
          <div class="block-img">
            <div class="img -good"><img src="<?php echo $path; ?>images/estimate/img05.jpeg" alt=""></div>
            <div class="img -bad"><img src="<?php echo $path; ?>images/estimate/img06.jpeg" alt=""></div>
          </div>
        </div>
      </li>
      <li class="item01">
        <p class="txt">※大きな凹みや傷や破損がある場合、その箇所の写真をアップロードしてください</p>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-ex-picture01">補足写真1</label>
        </div>
        <div class="data">
          <input id="estimate-form-ex-picture01" class="file" type="file" name="exPicture01">
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-ex-picture02">補足写真2</label>
        </div>
        <div class="data">
          <input id="estimate-form-ex-picture02" class="file" type="file" name="exPicture02">
        </div>
      </li>
      <li class="item01">
        <div class="datattl">
          <label for="estimate-form-ex-picture03">補足写真3</label>
        </div>
        <div class="data">
          <input id="estimate-form-ex-picture03" class="file" type="file" name="exPicture03">
        </div>
      </li>
    </ul>
  </div>
  <div class="block-btn">
    <button id="estimate-form-btn" class="btn btn-cmn01" type="submit" name="submit" value="確認">確認</button>
  </div>
</form>