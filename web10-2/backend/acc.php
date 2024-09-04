<fieldset>
    <legend>帳號管理</legend>
    <table class="tab">
        <tr>
            <td class="clo">帳號</td>
            <td class="clo">密碼</td>
            <td class="clo">刪除</td>
        </tr>
        <?php
        $users = $Users->all();
        // dd($users);
        foreach ($users as $users) {
        ?>
            <tr>
                <td><?= $users['acc']; ?></td>
                <td><?= str_repeat("*", strlen($users['pw'])); ?> </td>
                <td><input type="checkbox" name="del" value="<?= $users['id'] ?>;"></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <button onclick="del()">確定刪除</button>
        <button onclick="clear()">清空選取</button>
    </div>

    <h2>新增會員</h2>
    <div style="color:red">*請設定您要註冊的帳號及密碼（最長12個字元）</div>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼使用)</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clear()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }

        if (user.acc == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
            alert("不可空白")
        } else if (user.pw != user.pw2) {
            alert("密碼錯誤")
        } else {
            $.post("./api/chk_acc.php", {
                acc: user.acc
            }, (chkAcc) => {
                if (parseInt(chkAcc) == 1) {
                    alert("帳號重複")
                } else {
                    $.post("./api/reg.php", user, () => {
                        // alert("註冊成功，歡迎加入")
                        location.reload();
                    })
                }
            })
        }
    }

    function del() {
        let chks = $("input[type='checkbox']:checked");
        let ids = new Array();
        if (chks.length > 0) {
            for (let i = 0; i < chks.length; i++) {
                ids.push(chks[i].value)
            }
            $.post("./api/del_user.php", {
                ids
            }, (res) => {
                // console.log(res);
                location.reload();
            })
        } else {
            alert("沒有要刪除的帳號");
        }
    }
</script>