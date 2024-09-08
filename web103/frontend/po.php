<div>
    目前位置： 首頁 > 分類網誌 > <span id="navType">健康新知</span>
</div>
<div style="align-items: start; display: flex;">
    <fieldset style="padding: 10px; width:150px; ">
        <legend>分類網誌</legend>
        <a class="type" data-type="1" style="margin: 5px; display:block;">健康新知</a>
        <a class="type" data-type="2" style="margin: 5px; display:block;">菸害防治</a>
        <a class="type" data-type="3" style="margin: 5px; display:block;">癌症防治</a>
        <a class="type" data-type="4" style="margin: 5px; display:block;">慢性病防治</a>
    </fieldset>
    <fieldset style="padding: 10px; width:550px; ">
        <legend>文章列表</legend>
        <div id="content"></div>
    </fieldset>
</div>



<script>
    getTitles(1)

    $(".type").on("click", function() {
        $("#navType").text($(this).text())
        getTitles($(this).data('type'))
    })

    function getTitles(type) {
        $("#content").load("./api/get_titles.php", {
            type
        })
    }

    function getNews(id) {
        $("#content").load("./api/get_news.php", {
            id
        })

    }
</script>