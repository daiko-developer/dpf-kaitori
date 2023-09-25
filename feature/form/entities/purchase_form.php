<?php
include_once 'form.php';

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
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
    $body .= $this->getFormContentsOfMailBody($id);
    $body .= "--__BOUNDARY__\n";
    $body .= $this->getFileContentsOfMailBody();
    return $body;
  }

  /** ユーザーに送るメールの本文を取得 */
  function getMailBodyForUser($id): string {
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $body .= <<<EOD

    申込ありがとうございます。
    以下の内容を送信いたしました。
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    {$this->getFormContentsOfMailBody($id)}
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    E-mail: astron04a.e@email.com
    DPFラクラク買取

    EOD;
    $body .= "--__BOUNDARY__\n";
    $body .= $this->getFileContentsOfMailBody();
    return $body;
  }

  /** メール本文に挿入するフォーム内容を取得 */
  protected function getFormContentsOfMailBody($id): string {
    return <<<EOD

    受付番号：$id

    お客様情報
    お名前　　　　　　　　：{$this->formData['name']}
    お名前（フリガナ）　　：{$this->formData['nameFuri']}
    会社名　　　　　　　　：{$this->formData['company']}
    会社名（フリガナ）　　：{$this->formData['companyFuri']}
    郵便番号　　　　　　　：{$this->formData['post']}
    住所　　　　　　　　　：{$this->formData['address']}
    電話番号　　　　　　　：{$this->formData['tel']}
    メールアドレス　　　　：{$this->formData['applicantEmail']}
    本人確認書類（表）　　　　：{$this->fileData['picture01']['fileName']}
    本人確認書類（裏）　　　　：{$this->fileData['picture02']['fileName']}

    振り込み先情報
    金融機関名　　　　　　：{$this->formData['bank']}
    支店名（店番）　　　　：{$this->formData['branch']}
    種別　　　　　　　　　：{$this->formData['bankType']}
    口座番号　　　　　　　：{$this->formData['bankNumber']}
    口座名義人（カタカナ）：{$this->formData['bankUser']}
    査定金額の確認　　　　：{$this->formData['bankConfirm']}

    買取希望マフラー
    マフラー１
    車両型式　　　　　　　：{$this->formData['dpfType01']}
    車台番号　　　　　　　：{$this->formData['dpfCar01']}
    数量　　　　　　　　　：{$this->formData['dpfNumber01']}
    備考欄　　　　　　　　：{$this->formData['dpfDetail01']}
    マフラー２
    車両型式　　　　　　　：{$this->formData['dpfType02']}
    車台番号　　　　　　　：{$this->formData['dpfCar02']}
    数量　　　　　　　　　：{$this->formData['dpfNumber02']}
    備考欄　　　　　　　　：{$this->formData['dpfDetail02']}
    マフラー３
    車両型式　　　　　　　：{$this->formData['dpfType03']}
    車台番号　　　　　　　：{$this->formData['dpfCar03']}
    数量　　　　　　　　　：{$this->formData['dpfNumber03']}
    備考欄　　　　　　　　：{$this->formData['dpfDetail03']}
    マフラー４
    車両型式　　　　　　　：{$this->formData['dpfType04']}
    車台番号　　　　　　　：{$this->formData['dpfCar04']}
    数量　　　　　　　　　：{$this->formData['dpfNumber04']}
    備考欄　　　　　　　　：{$this->formData['dpfDetail04']}
    マフラー５
    車両型式　　　　　　　：{$this->formData['dpfType05']}
    車台番号　　　　　　　：{$this->formData['dpfCar05']}
    数量　　　　　　　　　：{$this->formData['dpfNumber05']}
    備考欄　　　　　　　　：{$this->formData['dpfDetail05']}

    EOD;
  }

  /** メール本文に挿入するファイル内容を取得 */
  protected function getFileContentsOfMailBody(): string {
    $fileBody = "Content-Type: application/octet-stream; name=\"{$this->fileData['picture01']['fileName']}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->fileData['picture01']['fileName']}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->fileData['picture01']['fileContents']));
    $fileBody .= "--__BOUNDARY__\n";
    $fileBody .= "Content-Type: application/octet-stream; name=\"{$this->fileData['picture02']['fileName']}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->fileData['picture02']['fileName']}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->fileData['picture02']['fileContents']));
    $fileBody .= "--__BOUNDARY__";
    return $fileBody;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    return [
      'applicationMethod' => $this->applicationMethod,
      'formType' => 'purchaseForm',
      'formData' => $this->formData,
      'fileData' => [
        'picture01' => $this->fileData['picture01']['fileName'],
        'picture02' => $this->fileData['picture02']['fileName'],
      ],
    ];
  }
}

?>