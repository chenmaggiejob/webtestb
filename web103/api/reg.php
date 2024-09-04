<?php include_once "base.php";

unset($_POST['pw2']);
echo $Users->save($_POST);
