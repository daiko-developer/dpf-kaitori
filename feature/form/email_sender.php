<?php
require __DIR__ . '../../../vendor/autoload.php';
include_once '../../../common/util/env.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class EmailSender {
    private $mailer;

    private $config;
    private $siteEmail;
    private $emailPassword;
    private $tempFiles;

    public function __construct() {
        $this->config = new EnvironmentConfig();
        $this->siteEmail = $this->config->get('email_username');
        $this->emailPassword = $this->config->get('email_password');

        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();
        $this->mailer->isHTML(true);
        $this->mailer->Host = 'sv534.xbiz.ne.jp';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->siteEmail;
        $this->mailer->Password = $this->emailPassword;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mailer->Port = 465;
        $this->mailer->CharSet = 'UTF-8';
    }

    public function attachFile($fileData) {
        if (isSet($fileData)) {
            foreach ($fileData as $image) {
                $tempFile = tempnam(sys_get_temp_dir(), 'img_');
                file_put_contents($tempFile, $image['fileContents']);
                $this->mailer->addAttachment($tempFile, $image['fileName']);
                $this->tempFiles[] = $tempFile;
            }
        }
    }

    public function sendToUser($to, $subject, $body,) {
        $this->mailer->clearAddresses();
        $this->mailer->setFrom($this->siteEmail, 'DPFラクラク買取');
        $this->mailer->addAddress($to);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        if (!$this->mailer->send()) {
            throw new Exception('ユーザーへのメールの送信に失敗しました: ' . $this->mailer->ErrorInfo);
        }
    }

    public function sendToStaff($subject, $body, $replyTo) {
        $this->mailer->clearAddresses();
        $this->mailer->setFrom($this->siteEmail, 'DPFラクラク買取');
        $this->mailer->addAddress($this->siteEmail);
        $this->mailer->addReplyTo($replyTo);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        if (!$this->mailer->send()) {
            throw new Exception('スタッフへのメールの送信に失敗しました: ' . $this->mailer->ErrorInfo);
        }

        // Optionally, delete the temporary files if you no longer need them
        if (isSet($this->tempFiles)) {
            foreach ($this->tempFiles as $tempFile) {
                unlink($tempFile);
            }
        }
    }
}
?>
