<?php
/** フォーム関連の抽象クラス */
abstract class Form {
  const SPREAD_SHEET_URL = "https://script.google.com/macros/s/AKfycbwa983TVTPnatajQ2L4x2QafqXQrjilzhsfdZOl10ToVWlQ-iv3o9xGUgLiWv10vgmeNQ/exec";

  /** フォームの内容をフィールドに格納 */
  abstract protected function setValuesFromForm(): void;
  /** フォームにエラーがあれば変数に格納 */
  abstract protected function setError(): array;
  /** フォームの内容をセッションに保存 */
  abstract protected function setSession(): void;
  /** フォームのエラー内容を出力 */
  abstract protected function echoErrors(array $errors): void;
  /** セッションにあるフォームの内容をフィールドに格納 */
  abstract protected function setValuesFromSession(): void;
  /** スタッフに送るメールのタイトルを取得 */
  abstract protected function getMailTitleForStaff(): string;
  /** ユーザーに送るメールのタイトルを取得 */
  abstract protected function getMailTitleForUser(): string;
  /** スタッフに送るメールの本文を取得 */
  abstract protected function getMailBodyForStaff(): string;
  /** ユーザーに送るメールの本文を取得 */
  abstract protected function getMailBodyForUser(): string;
  /** メール本文に挿入するフォーム内容を取得 */
  abstract protected function getFormContentsOfMailBody(): string;
  /** フォーム内容を記録するPOST先URLを返す */
  abstract protected function getPostUrl(): string;
  /** フォーム内容を返す */
  abstract protected function getPostData(): array;
}
?>