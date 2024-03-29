<?php
/** フォーム画面での処理 */
session_start();

// 送信ボタンが押されたかどうか
if(isset($_POST['submit'])){
  // POSTされたデータをエスケープ処理して変数に格納
  $form->setValuesFromForm();
  // エラーがあれば変数に格納
  $errors = $form->setError();
  // エラー配列がなければ異常なし
  if(count($errors) === 0){
    // エスケープ処理をして値を変数に格納済みの入力値
    $form->setSession();

    include_once '../../common/util/location.php';

    $url = $location . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/' . $form->confirmPage;

    // $typeが'staff'である場合、URLの末尾にクエリパラメータを追加
    $type = $_POST['type'] ?? '';
    if ($type == "staff") {
      $url .= "?type=staff";
    }

    header($url);
  }else{
    // エラー配列があればエラーを表示
    $form->echoErrors($errors);
  }
}

// confirm.phpから戻ってきたときに値を保持
if (isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit') {
  $form->setValuesFromSession();
};
?>