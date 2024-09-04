<?php
include_once "base.php";
// dd($_POST['ids']);
foreach ($_POST['ids'] as $id) {
    // echo $id;
    $Users->del($id);
}
