<?php
session_start();

switch ($_SESSION['fileData']['picture02']['fileType']) {
  case IMAGETYPE_JPEG:
  header('content-type: image/jpeg');
  break;
  case IMAGETYPE_PNG:
  header('content-type: image/png');
  break;
  case IMAGETYPE_GIF:
  header('content-type: image/gif');
  break;
}

echo $_SESSION['fileData']['picture02']['fileContents'];
?>