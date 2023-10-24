<?php
include_once 'form.php';
include_once __DIR__ . '../../../../common/util/env.php';

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
    $exPicture01 = isset($this->fileData['exPicture01']) ? $this->fileData['exPicture01']['fileName'] : '-';
    $exPicture02 = isset($this->fileData['exPicture02']) ? $this->fileData['exPicture02']['fileName'] : '-';
    $exPicture03 = isset($this->fileData['exPicture03']) ? $this->fileData['exPicture03']['fileName'] : '-';

    return <<<EOD
    受付番号：$id<br>
    <br>
    お客様情報<br>
    お名前　　　　　　　　　　：{$this->formData['name']}<br>
    電話番号　　　　　　　　　：{$this->formData['tel']}<br>
    メールアドレス　　　　　　：{$this->formData['applicantEmail']}<br>
    <br>
    マフラー情報<br>
    車両型式　　　　　　　　　：{$this->formData['dpfType01']}<br>
    車台番号　　　　　　　　　：{$this->formData['dpfCar01']}<br>
    備考欄　　　　　　　　　　：{$this->formData['dpfDetail01']}<br>
    DPF全体の写真　　　　　　：{$this->fileData['picture01']['fileName']}<br>
    DPFフィルター部分の写真　：{$this->fileData['picture02']['fileName']}<br>
    DPF出口側の写真　　　　　：{$this->fileData['picture03']['fileName']}<br>
    補足写真1　　　　　　　　：$exPicture01<br>
    補足写真2　　　　　　　　：$exPicture02<br>
    補足写真3　　　　　　　　：$exPicture03<br>
    EOD;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    $fileNames = [
      'picture01' => $this->fileData['picture01']['fileName'] ?? null,
      'picture02' => $this->fileData['picture02']['fileName'] ?? null,
      'picture03' => $this->fileData['picture03']['fileName'] ?? null,
    ];

    // exPicture が存在する場合のみ、そのデータを追加
    foreach (['exPicture01', 'exPicture02', 'exPicture03'] as $key) {
        if (isset($this->fileData[$key])) {
            $fileNames[$key] = $this->fileData[$key]['fileName'];
        }
    }

    return [
      'applicationMethod' => $this->applicationMethod,
      'formType' => 'estimateForm',
      'formData' => $this->formData,
      'fileData' => $fileNames,
    ];
  }
}

?>