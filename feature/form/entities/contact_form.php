<?php
include_once 'form.php';
include_once __DIR__ . '../../../../common/util/env.php';

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
    return "[お問い合せ]{$this->formData['name']}様";
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
    お問い合わせありがとうございます。<br>
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
    return <<<EOD
    受付番号：$id<br>
    <br>
    お客様情報<br>
    お名前　　　　　　　　：{$this->formData['name']}<br>
    電話番号　　　　　　　：{$this->formData['tel']}<br>
    メールアドレス　　　　：{$this->formData['applicantEmail']}<br>
    備考欄　　　　　　　　：{$this->formData['detail']}<br>
    EOD;
  }

  /** フォーム内容を返す */
  function getPostData(): array {
    return [
      'applicationMethod' => $this->applicationMethod,
      'formType' => 'contactForm',
      'formData' => $this->formData,
      'fileData' => $this->fileData,
    ];
  }
}
?>