<?php include_once "base.php";
$chk = $Users->count($_POST);

if ($chk) {
    $_SESSION['user'] = $_POST['acc'];
}

echo $chk;
