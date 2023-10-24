<?php
include_once 'form.php';
include_once __DIR__ . '../../../../common/util/env.php';

/** 買取フォームのクラス */
class PurchaseForm extends Form {
  public $confirmPage = 'purchase_confirm';
  public $sendPage = 'purchase_send';

  /** フォームにエラーがあれば変数に格納 */
  function setError():array {
    $errors = [];
    // trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
    if(trim($this->formData['name']) === '' || trim($this->formData['name']) === "　"){
      $errors['name'] = "お名前を入力してください";
    }
    if(trim($this->formData['nameFuri']) === '' || trim($this->formData['nameFuri']) === "　"){
      $errors['nameFuri'] = "お名前(フリガナ)を入力してください";
    }
    if(trim($this->formData['bank']) === '' || trim($this->formData['bank']) === "　"){
      $errors['bank'] = "金融機関名を入力してください";
    }
    if(trim($this->formData['branch']) === '' || trim($this->formData['branch']) === "　"){
      $errors['branch'] = "支店名(店番)を入力してください";
    }
    if(trim($this->formData['bankUser']) === '' || trim($this->formData['bankUser']) === "　"){
      $errors['bankUser'] = "口座名義人を入力してください";
    }
    if(trim($this->formData['dpfCar01']) === '' || trim($this->formData['dpfCar01']) === "　"){
      $errors['dpfCar01'] = "車台番号を入力してください";
    }

    return $errors;
  }

  /** スタッフに送るメールのタイトルを取得 */
  function getMailTitleForStaff(): string {
    return "[買取申込]{$this->formData['name']}様";
  }

  /** ユーザーに送るメールのタイトルを取得 */
  function getMailTitleForUser(): string {
    return "【自動送信】受付を完了いたしました。";
  }

  /** スタッフに送るメールの本文を取得 */
  function getMailBodyForStaff($id): string {
    $body = $this->getFormContentsOfMailBody($id);
    return $body;
  }

  /** ユーザーに送るメールの本文を取得 */
  function getMailBodyForUser($id): string {
    $config = new EnvironmentConfig();
    $emailReception = $config->get('email_reception');
    $body = <<<EOD
    申込ありがとうございます。<br>
    以下の内容を送信いたしました。<br>
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>
    <br>
    {$this->getFormContentsOfMailBody($id)}
    <br>
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>
    E-mail: {$emailReception}<br>
    DPFラクラク買取
    EOD;
    return $body;
  }

  /** メール本文に挿入するフォーム内容を取得 */
  protected function getFormContentsOfMailBody($id): string {
    $picture03 = isset($this->fileData['picture03']) ? $this->fileData['picture03']['fileName'] : '-';
    $picture04 = isset($this->fileData['picture04']) ? $this->fileData['picture04']['fileName'] : '-';

    return <<<EOD
    受付番号：$id<br>
    <br>
    お客様情報<br>
    お名前　　　　　　　　：{$this->formData['name']}<br>
    お名前（フリガナ）　　：{$this->formData['nameFuri']}<br>
    会社名　　　　　　　　：{$this->formData['company']}<br>
    会社名（フリガナ）　　：{$this->formData['companyFuri']}<br>
    郵便番号　　　　　　　：{$this->formData['post']}<br>
    住所　　　　　　　　　：{$this->formData['address']}<br>
    電話番号　　　　　　　：{$this->formData['tel']}<br>
    メールアドレス　　　　：{$this->formData['applicantEmail']}<br>
    本人確認書類（表）　　：{$this->fileData['picture01']['fileName']}<br>
    本人確認書類（裏）　　：{$this->fileData['picture02']['fileName']}<br>
    社会保険証(表)　　　　：$picture03<br>
    社会保険証(裏)　　　　：$picture04<br>
    <br>
    振り込み先情報<br>
    金融機関名　　　　　　：{$this->formData['bank']}<br>
    支店名（店番）　　　　：{$this->formData['branch']}<br>
    種別　　　　　　　　　：{$this->formData['bankType']}<br>
    口座番号　　　　　　　：{$this->formData['bankNumber']}<br>
    口座名義人（カタカナ）：{$this->formData['bankUser']}<br>
    査定金額の確認　　　　：{$this->formData['bankConfirm']}<br>
    <br>
    買取希望マフラー<br>
    マフラー１<br>
    車両型式　　　　　　　：{$this->formData['dpfType01']}<br>
    車台番号　　　　　　　：{$this->formData['dpfCar01']}<br>
    数量　　　　　　　　　：{$this->formData['dpfNumber01']}<br>
    備考欄　　　　　　　　：{$this->formData['dpfDetail01']}<br>
    マフラー２<br>
    車両型式　　　　　　　：{$this->formData['dpfType02']}<br>
    車台番号　　　　　　　：{$this->formData['dpfCar02']}<br>
    数量　　　　　　　　　：{$this->formData['dpfNumber02']}<br>
    備考欄　　　　　　　　：{$this->formData['dpfDetail02']}<br>
    マフラー３<br>
    車両型式　　　　　　　：{$this->formData['dpfType03']}<br>
    車台番号　　　　　　　：{$this->formData['dpfCar03']}<br>
    数量　　　　　　　　　：{$this->formData['dpfNumber03']}<br>
    備考欄　　　　　　　　：{$this->formData['dpfDetail03']}<br>
    マフラー４<br>
    車両型式　　　　　　　：{$this->formData['dpfType04']}<br>
    車台番号　　　　　　　：{$this->formData['dpfCar04']}<br>
    数量　　　　　　　　　：{$this->formData['dpfNumber04']}<br>
    備考欄　　　　　　　　：{$this->formData['dpfDetail04']}<br>
    マフラー５<br>
    車両型式　　　　　　　：{$this->formData['dpfType05']}<br>
    車台番号　　　　　　　：{$this->formData['dpfCar05']}<br>
    数量　　　　　　　　　：{$this->formData['dpfNumber05']}<br>
    備考欄　　　　　　　　：{$this->formData['dpfDetail05']}<br>
    EOD;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    $fileNames = [
      'picture01' => $this->fileData['picture01']['fileName'] ?? null,
      'picture02' => $this->fileData['picture02']['fileName'] ?? null,
    ];

    // picture03,04 が存在する場合のみ、そのデータを追加
    foreach (['picture03', 'picture04'] as $key) {
      if (isset($this->fileData[$key])) {
          $fileNames[$key] = $this->fileData[$key]['fileName'];
      }
  }

    return [
      'applicationMethod' => $this->applicationMethod,
      'formType' => 'purchaseForm',
      'formData' => $this->formData,
      'fileData' => $fileNames,
    ];
  }
}

?>