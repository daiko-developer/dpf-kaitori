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

    public function __construct() {
        $this->config = new EnvironmentConfig();
        $this->siteEmail = $this->config->get('email_username');
        $this->emailPassword = $this->config->get('email_password');

        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.lolipop.jp';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->siteEmail;
        $this->mailer->Password = $this->emailPassword;
        $this->mailer->SMTPSecure = 'ssl';
        $this->mailer->Port = 465;
        $this->mailer->CharSet = 'UTF-8';
        $this->mailer->addCustomHeader('Content-Type', "multipart/mixed;boundary=\"__BOUNDARY__\"\n");
    }

    public function sendToUser($to, $subject, $body) {
        $this->mailer->clearAddresses();
        $this->mailer->setFrom($this->siteEmail, 'DPFラクラク買取');
        $this->mailer->addAddress($to);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        if (!$this->mailer->send()) {
            throw new Exception('ユーザーへのメールの送信に失敗しました: ' . $this->mailer->ErrorInfo);
        }
    }

    public function sendToStaff($subject, $body) {
        $this->mailer->clearAddresses();
        $this->mailer->setFrom($this->siteEmail, 'DPFラクラク買取');
        $this->mailer->addAddress('dpf-kaitori@ml.rebuilt-world.com');
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        if (!$this->mailer->send()) {
            throw new Exception('スタッフへのメールの送信に失敗しました: ' . $this->mailer->ErrorInfo);
        }
    }
}
?>
