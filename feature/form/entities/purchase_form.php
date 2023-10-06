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
    $picture03 = isset($this->fileData['picture03']) ? $this->fileData['picture03']['fileName'] : '-';
    $picture04 = isset($this->fileData['picture04']) ? $this->fileData['picture04']['fileName'] : '-';

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
    本人確認書類（表）　　：{$this->fileData['picture01']['fileName']}
    本人確認書類（裏）　　：{$this->fileData['picture02']['fileName']}
    社会保険証(表)　　　　：$picture03
    社会保険証(裏)　　　　：$picture04

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
    $fileBody = "";

    // 必須の画像ファイルリスト
    $mandatoryPics = ['picture01', 'picture02'];
    foreach ($mandatoryPics as $key) {
        if (!isset($this->fileData[$key])) {
            throw new Exception("Mandatory picture {$key} is missing."); // 必須の画像が存在しない場合は例外をスロー
        }
        $fileBody .= $this->generateFileBody($key);
    }

    // 任意の画像ファイルリスト
    $optionalPics = ['picture03', 'picture04'];
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