<?php
include_once 'form.php';
include_once  __DIR__ .  '../../../../common/util/env.php';

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
    $body .= $this->getFileContentsOfMailBody();
    return $body;
  }

  /** ユーザーに送るメールの本文を取得 */
  function getMailBodyForUser($id): string {
    $config = new EnvironmentConfig();
    $emailReception = $config->get('email_reception');

    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $body .= <<<EOD

    申込ありがとうございます。
    以下の内容を送信いたしました。
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    {$this->getFormContentsOfMailBody($id)}
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    E-mail: {$emailReception}
    DPFラクラク買取

    EOD;
    $body .= $this->getFileContentsOfMailBody();
    return $body;
  }

  /** メール本文に挿入するフォーム内容を取得 */
  protected function getFormContentsOfMailBody($id): string {
    $exPicture01 = isset($this->fileData['exPicture01']) ? $this->fileData['exPicture01']['fileName'] : '-';
    $exPicture02 = isset($this->fileData['exPicture02']) ? $this->fileData['exPicture02']['fileName'] : '-';
    $exPicture03 = isset($this->fileData['exPicture03']) ? $this->fileData['exPicture03']['fileName'] : '-';

    return <<<EOD

    受付番号：$id

    お客様情報
    お名前　　　　　　　　　　：{$this->formData['name']}
    電話番号　　　　　　　　　：{$this->formData['tel']}
    メールアドレス　　　　　　：{$this->formData['applicantEmail']}

    マフラー情報
    車両型式　　　　　　　　　：{$this->formData['dpfType01']}
    車台番号　　　　　　　　　：{$this->formData['dpfCar01']}
    備考欄　　　　　　　　　　：{$this->formData['dpfDetail01']}
    DPF全体の写真　　　　　　：{$this->fileData['picture01']['fileName']}
    DPFフィルター部分の写真　：{$this->fileData['picture02']['fileName']}
    DPF出口側の写真　　　　　：{$this->fileData['picture03']['fileName']}
    補足写真1　　　　　　　　：$exPicture01
    補足写真2　　　　　　　　：$exPicture02
    補足写真3　　　　　　　　：$exPicture03

    EOD;
  }

  /** メール本文に挿入するファイル内容を取得 */
  protected function getFileContentsOfMailBody(): string {
    $fileBody = "";

    // 必須の画像ファイルリスト
    $mandatoryPics = ['picture01', 'picture02', 'picture03'];
    foreach ($mandatoryPics as $key) {
        if (!isset($this->fileData[$key])) {
            throw new Exception("Mandatory picture {$key} is missing."); // 必須の画像が存在しない場合は例外をスロー
        }
        $fileBody .= $this->generateFileBody($key);
    }

    // 任意の画像ファイルリスト
    $optionalPics = ['exPicture01', 'exPicture02', 'exPicture03'];
    foreach ($optionalPics as $key) {
        if (isset($this->fileData[$key])) {
            $fileBody .= $this->generateFileBody($key);
        }
    }

    if ($fileBody !== "") {
        $fileBody .= "--__BOUNDARY__"; // 最後のバウンダリ
    }

    return $fileBody;
  }

  /** 画像の内容をもとにファイルのボディ部分を生成 */
  protected function generateFileBody($key) {
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: application/octet-stream; name=\"{$this->fileData[$key]['fileName']}\"\n";
    $body .= "Content-Disposition: attachment; filename=\"{$this->fileData[$key]['fileName']}\"\n";
    $body .= "Content-Transfer-Encoding: base64\n";
    $body .= "\n";
    $body .= chunk_split(base64_encode($this->fileData[$key]['fileContents']));
    return $body;
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