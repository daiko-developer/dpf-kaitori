<?php
include_once 'form.php';

/** 画像見積りフォームのクラス */
class EstimateForm extends Form {
  public $confirmPage = 'estimate_confirm';
  public $sendPage = 'estimate_send';

  /** フォームにエラーがあれば変数に格納 */
  function setError():array {
    $errors = [];
    // trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
    if(trim($this->formData['name']) === '' || trim($this->formData['name']) === "　"){
      $errors['name'] = "お名前を入力してください";
    }
    if(trim($this->formData['dpfCar01']) === '' || trim($this->formData['dpfCar01']) === "　"){
      $errors['dpfCar01'] = "車台番号を入力してください";
    }

    return $errors;
  }

  /** スタッフに送るメールのタイトルを取得 */
  function getMailTitleForStaff(): string {
    return "[見積り]{$this->formData['name']}様";
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
    電話番号　　　　　　　：{$this->formData['tel']}
    メールアドレス　　　　：{$this->formData['applicantEmail']}

    マフラー情報
    車両型式　　　　　　　：{$this->formData['dpfType01']}
    車台番号　　　　　　　：{$this->formData['dpfCar01']}
    備考欄　　　　　　　　：{$this->formData['dpfDetail01']}
    DPF写真１　　　　　　：{$this->fileData['picture01']['fileName']}
    DPF写真２　　　　　　：{$this->fileData['picture02']['fileName']}
    DPF写真３　　　　　　：{$this->fileData['picture03']['fileName']}

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
    $fileBody .= "--__BOUNDARY__\n";
    $fileBody .= "Content-Type: application/octet-stream; name=\"{$this->fileData['picture03']['fileName']}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->fileData['picture03']['fileName']}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->fileData['picture03']['fileContents']));
    $fileBody .= "--__BOUNDARY__";
    return $fileBody;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    return [
      'applicationMethod' => $this->applicationMethod,
      'formType' => 'estimateForm',
      'formData' => $this->formData,
      'fileData' => [
        'picture01' => $this->fileData['picture01']['fileName'],
        'picture02' => $this->fileData['picture02']['fileName'],
        'picture03' => $this->fileData['picture03']['fileName'],
      ],
    ];
  }
}

?>