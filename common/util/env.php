<?php
require __DIR__ . '../../../vendor/autoload.php';

/**開発環境変数*/
$appEnv = getenv('APP_ENV');

class EnvironmentConfig {
  private $data = [];

  public function __construct() {
      $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . './../../', '.env');
      $dotenv->load();

      // 環境変数をプロパティとして保存
      $this->data['email_username'] = getenv('EMAIL_USERNAME');
      $this->data['email_password'] = getenv('EMAIL_PASSWORD');
      $this->data['email_reception'] = getenv('EMAIL_RECEPTION');
  }

  public function get($key) {
      return $this->data[$key] ?? null;
  }
}
?>