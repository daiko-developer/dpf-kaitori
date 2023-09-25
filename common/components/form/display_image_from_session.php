<?php
session_start();

if (isset($_GET['pic']) && isset($_SESSION['fileData'][$_GET['pic']])) {
    $selectedPic = $_SESSION['fileData'][$_GET['pic']];

    switch ($selectedPic['fileType']) {
      case IMAGETYPE_JPEG:
        header('Content-Type: image/jpeg');
        break;
      case IMAGETYPE_PNG:
        header('Content-Type: image/png');
        break;
      case IMAGETYPE_GIF:
        header('Content-Type: image/gif');
        break;
      default:
        die("Unsupported image type.");
    }

    echo $selectedPic['fileContents'];
} else {
    die("Invalid picture request.");
}
?>