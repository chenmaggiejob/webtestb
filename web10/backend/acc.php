<fieldset>
    <legend>帳號管理</legend>
    <table>
        <tr>
            <td class="clo">帳號</td>
            <td class="clo">密碼</td>
            <td class="clo">刪除</td>
        </tr>
        <?PHP
        $Users->all();
        foreach ($Users as $users) {
        ?>
            <tr>
                <td><?= $users['acc'] ?></td>
                <td><?= str_repeat("*", strlen($users['pw'])) ?></td>
                <td><input type="checkbox" name='del' value="<?= $users['id'] ?>"></td>
            </tr>
        <?PHP
        }
        ?>
    </table>
    <div>
        <button onclick="del()">確定刪除</button>
        <button onclick="clear()">清空選取</button>
    </div>

    <h2>新增會員</h2>

</fieldset>