<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script>
<script type="text/javascript">
function food_table(){
  _d = new Date().getTime();
  $.get("food_show.php?_d=" + _d, function(data){
  var a = data.split("\n");
  var table = "<table border=1 cellspacing=0 cellpadding=2>";
  table += "<tr><td>食品名</td><td>賞味期限</td></tr>";
  for(i=0;i<a.length-1;i++){
    var b = a[i].split(",");
    table += "<tr>><td>" + b[0] + "</td><td>" + b[1] + "</td></tr>";
  }
  table += "</table>";
  document.getElementById("kigen").innerHTML = table
  });
}
</script>
</head>
<body align="center">
<h1>期限マモル君</h1>
<script type="text/javascript">
food_table();
</script>
<div id="kigen" align="center"></div>
<br><br>
<input type="button" value="食品の追加" style="width:100px; height:50px" onClick="location.href='add.php'">
<input type="button" value="食品の編集" style="width:100px; height:50px" onClick="location.href='edit.php'">
</body>
</html>

