<?php
include_once 'form.php';
require_once __DIR__ . '../../../../common/util/escape.php';
/** お問い合わせフォームのクラス */
class ContactForm extends Form {
  const SPREAD_SHEET_URL = "https://script.google.com/macros/s/AKfycbzKHAerRrFOIzcgVcM3Bdwo8FcvmfiPah8OqR7QmOL9Qm2LGXpwI9rfZZ4eSDzDgFdm/exec";

  public $name;
  public $tel;
  public $applicantEmail;
  public $detail;
  public $confirmPage = 'contact_confirm';
  public $sendPage = 'contact_send';

  /** フォームの内容をフィールドに格納 */
  function setValuesFromForm(): void {
    // POSTされたデータをエスケープ処理して変数に格納
    $this->name = escape($_POST['name']);
    $this->tel = escape($_POST['tel']);
    $this->applicantEmail = escape($_POST['applicantEmail']);
    $this->detail = escape($_POST['detail']);
  }

  /** フォームにエラーがあれば変数に格納 */
  function setError():array {
    $errors = [];
    // trim(文字列)→文字列内の空白を除去 →値がなくなればエラーにする
    if(trim($this->name) === '' || trim($this->name) === "　"){
      $errors['name'] = "お名前を入力してください";
    }

    return $errors;
  }

  /** フォームの内容をセッションに保存 */
  function setSession():void {
    $_SESSION['name'] = $this->name;
    $_SESSION['tel'] = $this->tel;
    $_SESSION['applicantEmail'] = $this->applicantEmail;
    $_SESSION['detail'] = $this->detail;
  }

  /** フォームのエラー内容を出力 */
  function echoErrors($errors): void {
    echo $errors['name'];
  }

  /** セッションにあるフォームの内容をフィールドに格納 */
  function setValuesFromSession(): void {
    $this->name = $_SESSION['name'];
    $this->tel = $_SESSION['tel'];
    $this->applicantEmail = $_SESSION['applicantEmail'];
    $this->detail = $_SESSION['detail'];
  }

  /** スタッフに送るメールのタイトルを取得 */
  function getMailTitleForStaff(): string {
    return "[DPFラクラク買取]{$this->name}様よりお問い合わせがありました。";
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
    return $body;
  }

  /** ユーザーに送るメールの本文を取得 */
  function getMailBodyForUser(): string {
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $body .= <<<EOD

    お問い合わせありがとうございます。
    以下の内容を送信いたしました。
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    {$this->getFormContentsOfMailBody()}
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    E-mail: astron04a.e@email.com
    DPFラクラク買取

    EOD;
    $body .= "--__BOUNDARY__\n";
    return $body;
  }

  /** メール本文に挿入するフォーム内容を取得 */
  protected function getFormContentsOfMailBody(): string {
    return <<<EOD

    お客様情報
    お名前　　　　　　　　：{$this->name}
    電話番号　　　　　　　：{$this->tel}
    メールアドレス　　　　：{$this->applicantEmail}
    備考欄　　　　　　　　：{$this->detail}

    EOD;
  }

  /** フォーム内容を記録するPOST先URLを返す */
  function getPostUrl(): string {
    return self::SPREAD_SHEET_URL;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    return array(
      'name' => $this->name,
      'tel' => $this->tel,
      'applicantEmail' => $this->applicantEmail,
      'detail' => $this->detail,
    );
  }
}
?>