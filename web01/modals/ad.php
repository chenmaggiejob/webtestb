<h3 class="cent">新增動態文字廣告</h3>
<hr>

<!-- form:post>table>tr*3>td*2 -->
<form action="./api/add_title.php" method="post" enctype="multipart/form-data">
    <table>
        
        <tr>
            <td>標題區替代文字：</td>
            <td><input type="text" name="text" id="text"></td>
        </tr>
        <tr>
            <td>
                <!-- input:submit+input:reset -->
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            <td>
               
            </td>
        </tr>
    </table>
</form>