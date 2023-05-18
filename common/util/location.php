<?php
include_once 'env.php';

/**遷移時のheader設定(httpかhttpsか)*/
$location = $appEnv == 'dev' ? 'Location:http://' : 'Location:https://';
?>