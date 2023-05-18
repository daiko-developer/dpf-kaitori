<?php
/** フォーム確認画面での処理 */
session_start();

// セッションに保存したフォーム内容を変数に格納
$form->setValuesFromSession();

// トークンを作成してセッションに保存
$token = sha1(uniqid(mt_rand(),true));
$_SESSION['token'] = $token;
?>