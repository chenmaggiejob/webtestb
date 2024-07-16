<!-- 跟add_movie的差別是在年月日的選單是用foreach去跑出來的 -->
<style>
    .movie-data,
    .movie-intro {
        width: 600px;
        margin: auto;
        display: flex;
    }

    .movie-data>div:nth-child(1),
    .movie-intro>div:nth-child(1) {
        width: 100px;
    }

    .movie-data>div:nth-child(2),
    .movie-intro>div:nth-child(2) {
        width: 500px;
    }

    .movie-info label {
        display: inline-block;
        width: 100px;
        text-align-last: justify;
    }

    .movie-info div {
        margin: 5px 0;
    }
</style>
<h3 class="ct">新增院線片</h3>
<form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
    <div class='movie-data'>
        <div>影片資料</div>
        <div class="movie-info">
            <div>
                <label for="">片名</label>：
                <input type="text" name="name" value="">
            </div>
            <div>
                <label for="">分級</label>：
                <select name="level">
                    <option value="1">普遍級</option>
                    <option value="2">輔導級</option>
                    <option value="3">保護級</option>
                    <option value="4">限制級</option>
                </select>
            </div>
            <div>
                <label for="">片長</label>：
                <input type="text" name="length" value="">
            </div>

            <!-- 以下就是跟add_movie的差別，這邊月日的選單是用foreach去跑出來的 -->
            <div>
                <label for="">上映日期</label>：
                <select name="year">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>年

                <select name="month">
                    <?php
                    $m = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                    foreach ($m as $key => $value) {
                    ?>
                        <option value="<?= $value ?>"><?= $value ?></option>

                    <?php
                    }
                    ?>
                </select>月
                <select name="day">
                    <?php
                    $d = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
                    foreach ($d as $key1 => $value1) {
                        echo "<option value='$value1'>$value1</option>";
                    }
                    ?>
                </select>日
            </div>
            <div>
                <label for="">發行商</label>：
                <input type="text" name="publish" value="">
            </div>
            <div>
                <label for="">導演</label>：
                <input type="text" name="director" value="">
            </div>
            <div>
                <label for="">預告影片</label>：
                <input type="file" name="trailer" value="">
            </div>
            <div>
                <label for="">電影海報</label>：
                <input type="file" name="poster" value="">
            </div>
        </div>
    </div>
    <div class='movie-intro'>
        <div>劇情簡介</div>
        <div>
            <textarea name="intro" value="" style="width:99%;height:120px"></textarea>
        </div>
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>



</form>