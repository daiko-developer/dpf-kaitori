<?php
include_once 'form.php';

/** お問い合わせフォームのクラス */
class ContactForm extends Form {
  public $confirmPage = 'contact_confirm';
  public $sendPage = 'contact_send';

  /** フォームにエラーがあれば変数に格納 */
  function setError(): array {
    $errors = [];
    if (trim($this->formData['name']) === '' || trim($this->formData['name']) === "　") {
        $errors['name'] = "お名前を入力してください";
    }
    return $errors;
  }

  /** スタッフに送るメールのタイトルを取得 */
  function getMailTitleForStaff(): string {
    return "[DPFラクラク買取]{$this->formData['name']}様よりお問い合わせがありました。";
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
    return $body;
  }

  /** ユーザーに送るメールの本文を取得 */
  function getMailBodyForUser($id): string {
    $body = "--__BOUNDARY__\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $body .= <<<EOD

    お問い合わせありがとうございます。
    以下の内容を送信いたしました。
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    {$this->getFormContentsOfMailBody($id)}
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    E-mail: astron04a.e@email.com
    DPFラクラク買取

    EOD;
    $body .= "--__BOUNDARY__\n";
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
    備考欄　　　　　　　　：{$this->formData['detail']}

    EOD;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    return [
      'formType' => 'contactForm',
      'formData' => $this->formData,
      'fileData' => $this->fileData,
    ];
  }
}
?>