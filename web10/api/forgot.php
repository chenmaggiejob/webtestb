<?php
include_once "base.php";
$result = $Users->find(['email' => $_GET['email']]);
// echo dd($result);
if (!empty($result)) {
    echo  "您的密碼：{$result['pw']}";
} else {
    echo "查無資料";
}
