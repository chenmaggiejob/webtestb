<?php
include_once "base.php";

if (!empty($_FILES['img']['tmp_name'])) {
move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
$sql = "insert into `title`(`img`,`text`) values('{$_FILES['img']['name']}','{$_POST['text']}')";
$pdo->exec($sql);
header("location:../admin.php?do=title");
}
?>