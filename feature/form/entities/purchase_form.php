<?php
include_once 'form.php';
require_once __DIR__ . '../../../../common/util/escape.php';
/** 買取フォームのクラス */
class PurchaseForm extends Form {
  public $name;
  public $nameFuri;
  public $company;
  public $companyFuri;
  public $post;
  public $address;
  public $tel;
  public $applicantEmail;
  public $picture;
  public $pictureUra;
  public $pictureFileName;
  public $pictureUraFileName;
  public $pictureName;
  public $pictureUraName;
  public $pictureType;
  public $pictureUraType;
  public $bank;
  public $branch;
  public $bankType;
  public $bankNumber;
  public $bankUser;
  public $bankConfirm;
  public $dpfType01;
  public $dpfCar01;
  public $dpfNumber01;
  public $dpfDetail01;
  public $dpfType02;
  public $dpfCar02;
  public $dpfNumber02;
  public $dpfDetail02;
  public $dpfType03;
  public $dpfCar03;
  public $dpfNumber03;
  public $dpfDetail03;
  public $dpfType04;
  public $dpfCar04;
  public $dpfNumber04;
  public $dpfDetail04;
  public $dpfType05;
  public $dpfCar05;
  public $dpfNumber05;
  public $dpfDetail05;
  public $confirmPage = 'purchase_confirm';
  public $sendPage = 'purchase_send';

  /** フォームの内容をフィールドに格納 */
  function setValuesFromForm(): void {
    // POSTされたデータをエスケープ処理して変数に格納
    $this->name = escape($_POST['name']);
    $this->nameFuri = escape($_POST['nameFuri']);
    $this->company = escape($_POST['company']);
    $this->companyFuri = escape($_POST['companyFuri']);
    $this->post = escape($_POST['post']);
    $this->address = escape($_POST['address']);
    $this->tel = escape($_POST['tel']);
    $this->applicantEmail = escape($_POST['applicantEmail']);
    $this->picture = $_FILES['picture'];
    $this->pictureUra = $_FILES['pictureUra'];
    $this->pictureFileName = $_FILES['picture']['name'];
    $this->pictureUraFileName = $_FILES['pictureUra']['name'];
    $this->pictureName = file_get_contents($_FILES['picture']['tmp_name']);
    $this->pictureUraName = file_get_contents($_FILES['pictureUra']['tmp_name']);
    $this->pictureType = exif_imagetype($_FILES['picture']['tmp_name']);
    $this->pictureUraType = exif_imagetype($_FILES['pictureUra']['tmp_name']);
    $this->bank = escape($_POST['bank']);
    $this->branch = escape($_POST['branch']);
    $this->bankType = escape($_POST['bankType']);
    $this->bankNumber = escape($_POST['bankNumber']);
    $this->bankUser = escape($_POST['bankUser']);
    $this->bankConfirm = escape($_POST['bankConfirm']);
    $this->dpfType01 = escape($_POST['dpfType01']);
    $this->dpfCar01 = escape($_POST['dpfCar01']);
    $this->dpfNumber01 = escape($_POST['dpfNumber01']);
    $this->dpfDetail01 = escape($_POST['dpfDetail01']);
    $this->dpfType02 = escape($_POST['dpfType02']);
    $this->dpfCar02 = escape($_POST['dpfCar02']);
    $this->dpfNumber02 = escape($_POST['dpfNumber02']);
    $this->dpfDetail02 = escape($_POST['dpfDetail02']);
    $this->dpfType03 = escape($_POST['dpfType03']);
    $this->dpfCar03 = escape($_POST['dpfCar03']);
    $this->dpfNumber03 = escape($_POST['dpfNumber03']);
    $this->dpfDetail03 = escape($_POST['dpfDetail03']);
    $this->dpfType04 = escape($_POST['dpfType04']);
    $this->dpfCar04 = escape($_POST['dpfCar04']);
    $this->dpfNumber04 = escape($_POST['dpfNumber04']);
    $this->dpfDetail04 = escape($_POST['dpfDetail04']);
    $this->dpfType05 = escape($_POST['dpfType05']);
    $this->dpfCar05 = escape($_POST['dpfCar05']);
    $this->dpfNumber05 = escape($_POST['dpfNumber05']);
    $this->dpfDetail05 = escape($_POST['dpfDetail05']);
  }

  /** フォームにエラーがあれば変数に格納 */
  function setError():array {
    $errors = [];
    // trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
    if(trim($this->name) === '' || trim($this->name) === "　"){
      $errors['name'] = "お名前を入力してください";
    }
    if(trim($this->nameFuri) === '' || trim($this->nameFuri) === "　"){
      $errors['nameFuri'] = "お名前(フリガナ)を入力してください";
    }
    if(trim($this->bank) === '' || trim($this->bank) === "　"){
      $errors['bank'] = "金融機関名を入力してください";
    }
    if(trim($this->branch) === '' || trim($this->branch) === "　"){
      $errors['branch'] = "支店名(店番)を入力してください";
    }
    if(trim($this->bankUser) === '' || trim($this->bankUser) === "　"){
      $errors['bankUser'] = "口座名義人を入力してください";
    }
    if(trim($this->dpfCar01) === '' || trim($this->dpfCar01) === "　"){
      $errors['dpfCar01'] = "車台番号を入力してください";
    }

    return $errors;
  }

  /** フォームの内容をセッションに保存 */
  function setSession():void {
    $_SESSION['name'] = $this->name;
    $_SESSION['nameFuri'] = $this->nameFuri;
    $_SESSION['company'] = $this->company;
    $_SESSION['companyFuri'] = $this->companyFuri;
    $_SESSION['post'] = $this->post;
    $_SESSION['address'] = $this->address;
    $_SESSION['tel'] = $this->tel;
    $_SESSION['applicantEmail'] = $this->applicantEmail;
    $_SESSION['picture'] = $this->picture;
    $_SESSION['pictureUra'] = $this->pictureUra;
    $_SESSION['pictureFileName'] = $this->pictureFileName;
    $_SESSION['pictureUraFileName'] = $this->pictureUraFileName;
    $_SESSION['pictureName'] = $this->pictureName;
    $_SESSION['pictureUraName'] = $this->pictureUraName;
    $_SESSION['pictureType'] = $this->pictureType;
    $_SESSION['pictureUraType'] = $this->pictureUraType;
    $_SESSION['bank'] = $this->bank;
    $_SESSION['branch'] = $this->branch;
    $_SESSION['bankType'] = $this->bankType;
    $_SESSION['bankNumber'] = $this->bankNumber;
    $_SESSION['bankUser'] = $this->bankUser;
    $_SESSION['bankConfirm'] = $this->bankConfirm;
    $_SESSION['dpfType01'] = $this->dpfType01;
    $_SESSION['dpfCar01'] = $this->dpfCar01;
    $_SESSION['dpfNumber01'] = $this->dpfNumber01;
    $_SESSION['dpfDetail01'] = $this->dpfDetail01;
    $_SESSION['dpfType02'] = $this->dpfType02;
    $_SESSION['dpfCar02'] = $this->dpfCar02;
    $_SESSION['dpfNumber02'] = $this->dpfNumber02;
    $_SESSION['dpfDetail02'] = $this->dpfDetail02;
    $_SESSION['dpfType03'] = $this->dpfType03;
    $_SESSION['dpfCar03'] = $this->dpfCar03;
    $_SESSION['dpfNumber03'] = $this->dpfNumber03;
    $_SESSION['dpfDetail03'] = $this->dpfDetail03;
    $_SESSION['dpfType04'] = $this->dpfType04;
    $_SESSION['dpfCar04'] = $this->dpfCar04;
    $_SESSION['dpfNumber04'] = $this->dpfNumber04;
    $_SESSION['dpfDetail04'] = $this->dpfDetail04;
    $_SESSION['dpfType05'] = $this->dpfType05;
    $_SESSION['dpfCar05'] = $this->dpfCar05;
    $_SESSION['dpfNumber05'] = $this->dpfNumber05;
    $_SESSION['dpfDetail05'] = $this->dpfDetail05;
  }

  /** フォームのエラー内容を出力 */
  function echoErrors($errors): void {
    echo $errors['name'];
    echo $errors['nameFuri'];
    echo $errors['bank'];
    echo $errors['branch'];
    echo $errors['bankUser'];
    echo $errors['dpfCar01'];
  }

  /** セッションにあるフォームの内容をフィールドに格納 */
  function setValuesFromSession(): void {
    $this->name = $_SESSION['name'];
    $this->nameFuri = $_SESSION['nameFuri'];
    $this->company = $_SESSION['company'];
    $this->companyFuri = $_SESSION['companyFuri'];
    $this->post = $_SESSION['post'];
    $this->address = $_SESSION['address'];
    $this->tel = $_SESSION['tel'];
    $this->applicantEmail = $_SESSION['applicantEmail'];
    $this->picture = $_SESSION['picture'];
    $this->pictureUra = $_SESSION['pictureUra'];
    $this->pictureFileName = $_SESSION['pictureFileName'];
    $this->pictureUraFileName = $_SESSION['pictureUraFileName'];
    $this->pictureName = $_SESSION['pictureName'];
    $this->pictureUraName = $_SESSION['pictureUraName'];
    $this->pictureType = $_SESSION['pictureType'];
    $this->pictureUraType = $_SESSION['pictureUraType'];
    $this->bank = $_SESSION['bank'];
    $this->branch = $_SESSION['branch'];
    $this->bankType = $_SESSION['bankType'];
    $this->bankNumber = $_SESSION['bankNumber'];
    $this->bankUser = $_SESSION['bankUser'];
    $this->bankConfirm = $_SESSION['bankConfirm'];
    $this->dpfType01 = $_SESSION['dpfType01'];
    $this->dpfCar01 = $_SESSION['dpfCar01'];
    $this->dpfNumber01 = $_SESSION['dpfNumber01'];
    $this->dpfDetail01 = $_SESSION['dpfDetail01'];
    $this->dpfType02 = $_SESSION['dpfType02'];
    $this->dpfCar02 = $_SESSION['dpfCar02'];
    $this->dpfNumber02 = $_SESSION['dpfNumber02'];
    $this->dpfDetail02 = $_SESSION['dpfDetail02'];
    $this->dpfType03 = $_SESSION['dpfType03'];
    $this->dpfCar03 = $_SESSION['dpfCar03'];
    $this->dpfNumber03 = $_SESSION['dpfNumber03'];
    $this->dpfDetail03 = $_SESSION['dpfDetail03'];
    $this->dpfType04 = $_SESSION['dpfType04'];
    $this->dpfCar04 = $_SESSION['dpfCar04'];
    $this->dpfNumber04 = $_SESSION['dpfNumber04'];
    $this->dpfDetail04 = $_SESSION['dpfDetail04'];
    $this->dpfType05 = $_SESSION['dpfType05'];
    $this->dpfCar05 = $_SESSION['dpfCar05'];
    $this->dpfNumber05 = $_SESSION['dpfNumber05'];
    $this->dpfDetail05 = $_SESSION['dpfDetail05'];
  }

  /** スタッフに送るメールのタイトルを取得 */
  function getMailTitleForStaff(): string {
    return "[DPFラクラク買取]{$this->name}様より買取申込がきました。";
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
    お名前（フリガナ）　　：{$this->nameFuri}
    会社名　　　　　　　　：{$this->company}
    会社名（フリガナ）　　：{$this->companyFuri}
    郵便番号　　　　　　　：{$this->post}
    住所　　　　　　　　　：{$this->address}
    電話番号　　　　　　　：{$this->tel}
    メールアドレス　　　　：{$this->applicantEmail}
    本人確認書類（表）　　　　：{$this->pictureFileName}
    本人確認書類（裏）　　　　：{$this->pictureUraFileName}

    振り込み先情報
    金融機関名　　　　　　：{$this->bank}
    支店名（店番）　　　　：{$this->branch}
    種別　　　　　　　　　：{$this->bankType}
    口座番号　　　　　　　：{$this->bankNumber}
    口座名義人（カタカナ）：{$this->bankUser}
    査定金額の確認　　　　：{$this->bankConfirm}

    買取希望マフラー
    マフラー１
    車両型式　　　　　　　：{$this->dpfType01}
    車台番号　　　　　　　：{$this->dpfCar01}
    数量　　　　　　　　　：{$this->dpfNumber01}
    備考欄　　　　　　　　：{$this->dpfDetail01}
    マフラー２
    車両型式　　　　　　　：{$this->dpfType02}
    車台番号　　　　　　　：{$this->dpfCar02}
    数量　　　　　　　　　：{$this->dpfNumber02}
    備考欄　　　　　　　　：{$this->dpfDetail02}
    マフラー３
    車両型式　　　　　　　：{$this->dpfType03}
    車台番号　　　　　　　：{$this->dpfCar03}
    数量　　　　　　　　　：{$this->dpfNumber03}
    備考欄　　　　　　　　：{$this->dpfDetail03}
    マフラー４
    車両型式　　　　　　　：{$this->dpfType04}
    車台番号　　　　　　　：{$this->dpfCar04}
    数量　　　　　　　　　：{$this->dpfNumber04}
    備考欄　　　　　　　　：{$this->dpfDetail04}
    マフラー５
    車両型式　　　　　　　：{$this->dpfType05}
    車台番号　　　　　　　：{$this->dpfCar05}
    数量　　　　　　　　　：{$this->dpfNumber05}
    備考欄　　　　　　　　：{$this->dpfDetail05}

    EOD;
  }

  /** メール本文に挿入するファイル内容を取得 */
  protected function getFileContentsOfMailBody(): string {
    $fileBody = "Content-Type: application/octet-stream; name=\"{$this->pictureFileName}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->pictureFileName}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->pictureName));
    $fileBody .= "--__BOUNDARY__\n";
    $fileBody .= "Content-Type: application/octet-stream; name=\"{$this->pictureUraFileName}\"\n";
    $fileBody .= "Content-Disposition: attachment; filename=\"{$this->pictureUraFileName}\"\n";
    $fileBody .= "Content-Transfer-Encoding: base64\n";
    $fileBody .= "\n";
    $fileBody .= chunk_split(base64_encode($this->pictureUraName));
    $fileBody .= "--__BOUNDARY__";
    return $fileBody;
  }

  /** フォーム内容を記録するPOST先URLを返す */
  function getPostUrl(): string {
    return self::SPREAD_SHEET_URL;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    return array(
      'name' => $this->name,
      'nameFuri' => $this->nameFuri,
      'company' => $this->company,
      'companyFuri' => $this->companyFuri,
      'post' => $this->post,
      'address' => $this->address,
      'tel' => $this->tel,
      'applicantEmail' => $this->applicantEmail,
      'bank' => $this->bank,
      'branch' => $this->branch,
      'bankType' => $this->bankType,
      'bankNumber' => $this->bankNumber,
      'bankUser' => $this->bankUser,
      'bankConfirm' => $this->bankConfirm,
      'dpfType01' => $this->dpfType01,
      'dpfCar01' => $this->dpfCar01,
      'dpfNumber01' => $this->dpfNumber01,
      'dpfDetail01' => $this->dpfDetail01,
      'dpfType02' => $this->dpfType02,
      'dpfCar02' => $this->dpfCar02,
      'dpfNumber02' => $this->dpfNumber02,
      'dpfDetail02' => $this->dpfDetail02,
      'dpfType03' => $this->dpfType03,
      'dpfCar03' => $this->dpfCar03,
      'dpfNumber03' => $this->dpfNumber03,
      'dpfDetail03' => $this->dpfDetail03,
      'dpfType04' => $this->dpfType04,
      'dpfCar04' => $this->dpfCar04,
      'dpfNumber04' => $this->dpfNumber04,
      'dpfDetail04' => $this->dpfDetail04,
      'dpfType05' => $this->dpfType05,
      'dpfCar05' => $this->dpfCar05,
      'dpfNumber05' => $this->dpfNumber05,
      'dpfDetail05' => $this->dpfDetail05,
      'formType' => 'purchaseForm',
    );
  }
}

?>