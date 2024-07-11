<div>
    目前位置：首頁 > 人氣文章區
</div>
<table class="tab pop">
    <tr>
        <td width="30%">標題</td>
        <td width="50%">內容</td>
        <td>人氣</td>
    </tr>
    <?php
    $total = $News->count(['sh' => 1]);
    $div = 5;
    $pages = ceil($total / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(['sh' => 1], " ORDER BY `good` desc limit $start,$div");
    foreach ($rows as $idx => $row) {
    ?>
        <tr>
            <td class='pop-header'><?= $row['title']; ?></td>
            <td class='pop-header'>
                <div class="short">
                    <?= mb_substr($row['article'], 0, 30); ?>
                </div>
                <div class="alert">
                    <div style='font-size:20px;color:skyblue'>
                        <?php
                        $type = ['', '健康新知', '菸害防治', '癌症防治', '慢性病防治'];
                        echo $type[$row['type']];
                        ?>
                    </div>
                    <?= nl2br($row['article']); ?>
                </div>
            </td>
            <td>
                <?= $row['good']; ?>個人說
                <img src="./icon/02B03.jpg" style="width: 20px;">
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div>
    <?php
    if ($now - 1 > 0) {
        $prev = $now - 1;
        echo "<a href='?do=pop&p=$prev'> < </a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
        $font = ($i == $now) ? '20px' : '16px';
        echo "<a href='?do=pop&p=$i' style='font-size:$font;'> $i </a>";
    }

    if ($now + 1 <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=pop&p=$next'> > </a>";
    }
    ?>

</div>

<script>
    $(".pop-header").hover(
        function() {
            $(this).parent().find('.alert').show()
        },
        function() {
            $(this).parent().find('.alert').hide()
        },

    )
</script>