<?php
include_once "base.php";
$result = $Users->find(['email' => $_GET['email']]);
if (!empty($result)) {
    echo "您的密碼為：{$result['pw']}";
} else {
    echo "查無資料";
}
