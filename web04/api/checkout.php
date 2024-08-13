<?php
include_once "base.php";

$_POST['acc'] = $_SESSION['Mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['orderdate'] = date("Y-m-d");
$_POST['no'] = date("Ymd") . rand(100000, 999999);

echo $Order->save($_POST);

unset($_SESSION['cart']);
/* 
foreach ($_SESSION['cart'] as $id => $qt) {
    unset($_SESSION['cart'][$id]);
}
 */