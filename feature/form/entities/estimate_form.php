<?php
include_once 'form.php';
/** 画像見積りフォームのクラス */
class EstimateForm extends Form {
  public $name;
  public $tel;
  public $applicantEmail;
  public $dpfType01;
  public $dpfCar01;
  public $dpfDetail01;
  public $picture01;
  public $picture01FileName;
  public $picture01Name;
  public $picture01Type;
  public $picture02;
  public $picture02FileName;
  public $picture02Name;
  public $picture02Type;
  public $picture03;
  public $picture03FileName;
  public $picture03Name;
  public $picture03Type;
  public $confirmPage = 'estimate_confirm';
  public $sendPage = 'estimate_send';

  /** フォームの内容をフィールドに格納 */
  function setValuesFromForm(): void {
    require_once '../../util/escape.php';

    // POSTされたデータをエスケープ処理して変数に格納
    $this->name = escape($_POST['name']);
    $this->tel = escape($_POST['tel']);
    $this->applicantEmail = escape($_POST['applicantEmail']);

    $this->dpfType01 = escape($_POST['dpfType01']);
    $this->dpfCar01 = escape($_POST['dpfCar01']);
    $this->dpfDetail01 = escape($_POST['dpfDetail01']);

    $this->picture01 = $_FILES['picture01'];
    $this->picture01FileName = $_FILES['picture01']['name'];
    $this->picture01Name = file_get_contents($_FILES['picture01']['tmp_name']);
    $this->picture01Type = exif_imagetype($_FILES['picture01']['tmp_name']);
    $this->picture02 = $_FILES['picture02'];
    $this->picture02FileName = $_FILES['picture02']['name'];
    $this->picture02Name = file_get_contents($_FILES['picture02']['tmp_name']);
    $this->picture02Type = exif_imagetype($_FILES['picture02']['tmp_name']);
    $this->picture03 = $_FILES['picture03'];
    $this->picture03FileName = $_FILES['picture03']['name'];
    $this->picture03Name = file_get_contents($_FILES['picture03']['tmp_name']);
    $this->picture03Type = exif_imagetype($_FILES['picture03']['tmp_name']);
  }

  /** フォームにエラーがあれば変数に格納 */
  function setError():array {
    $errors = [];
    // trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
    if(trim($this->name) === '' || trim($this->name) === "　"){
      $errors['name'] = "お名前を入力してください";
    }
    if(trim($this->dpfCar01) === '' || trim($this->dpfCar01) === "　"){
      $errors['dpfCar01'] = "車台番号を入力してください";
    }

    return $errors;
  }

  /** フォームの内容をセッションに保存 */
  function setSession():void {
    $_SESSION['name'] = $this->name;
    $_SESSION['tel'] = $this->tel;
    $_SESSION['applicantEmail'] = $this->applicantEmail;

    $_SESSION['dpfType01'] = $this->dpfType01;
    $_SESSION['dpfCar01'] = $this->dpfCar01;
    $_SESSION['dpfDetail01'] = $this->dpfDetail01;

    $_SESSION['picture01'] = $this->picture01;
    $_SESSION['picture01FileName'] = $this->picture01FileName;
    $_SESSION['picture01Name'] = $this->picture01Name;
    $_SESSION['picture01Type'] = $this->picture01Type;
    $_SESSION['picture02'] = $this->picture02;
    $_SESSION['picture02FileName'] = $this->picture02FileName;
    $_SESSION['picture02Name'] = $this->picture02Name;
    $_SESSION['picture02Type'] = $this->picture02Type;
    $_SESSION['picture03'] = $this->picture03;
    $_SESSION['picture03FileName'] = $this->picture03FileName;
    $_SESSION['picture03Name'] = $this->picture03Name;
    $_SESSION['picture03Type'] = $this->picture03Type;
  }

  /** フォームのエラー内容を出力 */
  function echoErrors($errors): void {
    echo $errors['name'];
    echo $errors['dpfCar01'];
  }

  /** セッションにあるフォームの内容をフィールドに格納 */
  function setValuesFromSession(): void {
    $this->name = $_SESSION['name'];
    $this->tel = $_SESSION['tel'];
    $this->applicantEmail = $_SESSION['applicantEmail'];

    $this->dpfType01 = $_SESSION['dpfType01'];
    $this->dpfCar01 = $_SESSION['dpfCar01'];
    $this->dpfDetail01 = $_SESSION['dpfDetail01'];

    $this->picture01 = $_SESSION['picture01'];
    $this->picture01FileName = $_SESSION['picture01FileName'];
    $this->picture01Name = $_SESSION['picture01Name'];
    $this->picture01Type = $_SESSION['picture01Type'];
    $this->picture02 = $_SESSION['picture02'];
    $this->picture02FileName = $_SESSION['picture02FileName'];
    $this->picture02Name = $_SESSION['picture02Name'];
    $this->picture02Type = $_SESSION['picture02Type'];
    $this->picture03 = $_SESSION['picture03'];
    $this->picture03FileName = $_SESSION['picture03FileName'];
    $this->picture03Name = $_SESSION['picture03Name'];
    $this->picture03Type = $_SESSION['picture03Type'];
  }

  /** スタッフに送るメールのタイトルを取得 */
  function getMailTitleForStaff(): string {
    return "[DPFラクラク買取]{$this->name}様よりDPF写真お見積りがきました。";
  }

  /** ユーザーに送るメールのタイトルを取得 */
  function getMailTitleForUser(): string {
    return "【自動送信】受付を完了いたしました。";
  }

  /** スタッフに送るメールの本文を取得 */
  function getMailBodyForStaff(): string {
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
    $body .= $this->getFormContentsOfMailBody();
    $body .= "--__BOUNDARY__\n";
    $body .= $this->getFileContentsOfMailBody();
    return $body;
  }

  /** ユーザーに送るメールの本文を取得 */
  function getMailBodyForUser(): string {
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $body .= <<<EOD

    申込ありがとうございます。
    以下の内容を送信いたしました。
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    {$this->getFormContentsOfMailBody()}
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    E-mail: astron04a.e@email.com
    DPFラクラク買取

    EOD;
    $body .= "--__BOUNDARY__\n";
    $body .= $this->getFileContentsOfMailBody();
    return $body;
  }

  /** メール本文に挿入するフォーム内容を取得 */
  protected function getFormContentsOfMailBody(): string {
    return <<<EOD

    お客様情報
    お名前　　　　　　　　：{$this->name}
    電話番号　　　　　　　：{$this->tel}
    メールアドレス　　　　：{$this->applicantEmail}

    マフラー情報
    車両型式　　　　　　　：{$this->dpfType01}
    車台番号　　　　　　　：{$this->dpfCar01}
    備考欄　　　　　　　　：{$this->dpfDetail01}
    DPF写真１　　　　　　：{$this->picture01FileName}
    DPF写真２　　　　　　：{$this->picture02FileName}
    DPF写真３　　　　　　：{$this->picture03FileName}

    EOD;
  }

  /** メール本文に挿入するファイル内容を取得 */
  protected function getFileContentsOfMailBody(): string {
    $fileBody = "Content-Type: application/octet-stream; name=\"{$this->picture01FileName}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->picture01FileName}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->picture01Name));
    $fileBody .= "--__BOUNDARY__\n";
    $fileBody .= "Content-Type: application/octet-stream; name=\"{$this->picture02FileName}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->picture02FileName}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->picture02Name));
    $fileBody .= "--__BOUNDARY__\n";
    $fileBody .= "Content-Type: application/octet-stream; name=\"{$this->picture03FileName}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->picture03FileName}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->picture03Name));
    $fileBody .= "--__BOUNDARY__";
    return $fileBody;
  }
}

?>