<?php
include_once "base.php";

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {

        $Ad->del($id);
    } else {
        $row = $Ad->find($id);
        $row['text'] = $_POST['text'][$key];
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;

        $Ad->save($row);
    }
}

to("../admin.php?do=ad");
