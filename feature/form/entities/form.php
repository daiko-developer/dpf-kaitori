<?php
/** フォーム関連の抽象クラス */
abstract class Form {
  const SPREAD_SHEET_URL = "https://script.google.com/macros/s/AKfycbwa983TVTPnatajQ2L4x2QafqXQrjilzhsfdZOl10ToVWlQ-iv3o9xGUgLiWv10vgmeNQ/exec";

  protected $applicationMethod;
  public $formData = [];
  public $fileData = [];

  /** フォームにエラーがあれば変数に格納 */
  abstract protected function setError(): array;
  /** スタッフに送るメールのタイトルを取得 */
  abstract protected function getMailTitleForStaff(): string;
  /** ユーザーに送るメールのタイトルを取得 */
  abstract protected function getMailTitleForUser(): string;
  /** スタッフに送るメールの本文を取得 */
  abstract protected function getMailBodyForStaff(string $id): string;
  /** ユーザーに送るメールの本文を取得 */
  abstract protected function getMailBodyForUser(string $id): string;
  /** メール本文に挿入するフォーム内容を取得 */
  abstract protected function getFormContentsOfMailBody(string $id): string;
  /** フォーム内容を返す */
  abstract protected function getPostData(): array;

  public function __construct(string $applicationMethod) {
      $this->applicationMethod = $applicationMethod;
  }

  /** フォームの内容をフィールドに格納 */
  function setValuesFromForm(): void {
    // POSTされたデータをエスケープ処理して変数に格納
    foreach ($_POST as $key => $value) {
      $this->formData[$key] = $this->escape($value);
    }

    // Files data
    foreach ($_FILES as $key => $fileInfo) {
      if ($fileInfo['error'] == 4) {
        continue;
      }

      $this->fileData[$key] = [
        'file' => $fileInfo,
        'fileName' => $fileInfo['name'],
        'fileContents' => file_get_contents($fileInfo['tmp_name']),
        'fileType' => exif_imagetype($fileInfo['tmp_name'])
      ];
    }
  }

  /** フォームの内容をセッションに保存 */
  function setSession(): void {
    $_SESSION['applicationMethod'] = $this->applicationMethod;
    $_SESSION['formData'] = $this->formData;
    $_SESSION['fileData'] = $this->fileData;
  }

  /** セッションにあるフォームの内容をフィールドに格納 */
  function setValuesFromSession(): void {
    $this->applicationMethod = $_SESSION['applicationMethod'];
    $this->formData = $_SESSION['formData'];
    $this->fileData = $_SESSION['fileData'];
  }

  /** フォームのエラー内容を出力 */
  function echoErrors($errors): void {
    foreach ($errors as $key => $value) {
        echo $value;
    }
  }

  /** フォーム内容を記録するPOST先URLを返す */
  function getPostUrl(): string {
    return self::SPREAD_SHEET_URL;
  }

  // エスケープ処理
  function escape(string $str,string $charset = 'UTF-8'):string{
    return htmlspecialchars($str,ENT_QUOTES | ENT_HTML5,$charset);
  }
}
?>