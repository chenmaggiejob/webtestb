<fieldset style="width:60%;margin:20px auto">
    <legend>忘記密碼</legend>
  <div>請輸入信箱以查詢密碼</div>
  <div><input type="text" name="email" id="email"></div>
  <div id="result"></div>
  <div><button onclick="find()">尋找</button></div>
</fieldset>

<script>
function find () {
$.get("./api/forgot.php", {
    email: $("#email").val()
}, (result) => {
    $("#result").text(result)
})
}
</script>