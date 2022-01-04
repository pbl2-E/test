<!DOCTYPE html>
<html lang="ja">
<head>
<style type="text/css">
.button {
  display       : inline-block;
  border-radius : 50%;          /* 角丸       */
  font-size     : 18pt;        /* 文字サイズ */
  text-align    : center;      /* 文字位置   */
  cursor        : pointer;     /* カーソル   */
  padding       : 12px 12px;   /* 余白       */
  background    : #ff7f00;     /* 背景色     */
  color         : #000000;     /* 文字色     */
  line-height   : 1em;         /* 1行の高さ  */
  transition    : .3s;         /* なめらか変化 */
  box-shadow    : 6px 6px 3px #666666;  /* 影の設定 */
  border        : 2px solid #ff7f00;    /* 枠の指定 */
}
.button:hover {
  box-shadow    : none;        /* カーソル時の影消去 */
  color         : #ff7f00;     /* 背景色     */
  background    : #000000;     /* 文字色     */
}
</style>
<meta charset="UTF-8"/>
<script type="text/javascript" src="zepto.min.js"></script>
<script type="text/javascript">
function sort_day(){
 _d = new Date().getTime(); //キャッシュ回避のため日時を利用する
 $.get("Sort_day.php?_d=" + _d, function(data){
 var a = data.split("\n"); //改行で区切る
 for(i=0;i<a.length-1;i++){
  var b = a[i].split(","); //カンマで区切る
}
if(typeof a[0] != 'undefined'){
document.getElementById("plan0").innerHTML = a[0];
}

if(typeof a[1] != 'undefined'){
document.getElementById("plan1").innerHTML = a[1];
}
if(typeof a[2] != 'undefined'){
document.getElementById("plan2").innerHTML = a[2];
}
if(typeof a[3] != 'undefined'){
document.getElementById("plan3").innerHTML = a[3];
}
 });
}

function sort_priority(){
 _d = new Date().getTime(); //キャッシュ回避のため日時を利用する
 $.get("Sort_priority.php?_d=" + _d, function(data){
 var a = data.split("\n"); //改行で区切る
 for(i=0;i<a.length-1;i++){
  var b = a[i].split(","); //カンマで区切る
}
if(typeof a[0] != 'undefined'){
document.getElementById("plan0").innerHTML = a[0];
}

if(typeof a[1] != 'undefined'){
document.getElementById("plan1").innerHTML = a[1];
}
if(typeof a[2] != 'undefined'){
document.getElementById("plan2").innerHTML = a[2];
}
if(typeof a[3] != 'undefined'){
document.getElementById("plan3").innerHTML = a[3];
}
 });
}
</script>
</head>
<body style="background-color: gainsboro">

<a href="javascript:history.back()">戻る</a>
<a href="home.html">ホーム画面</a><br><br>
<div align="center">
<h1>ToDo List</h1>
<li style="font-weight: bold; font-size: 30px;">予定を入れる</li>
<form action="error.php" method="POST">
<table>
<tr>

<input type="text" name="date" style="font-size:20px; width: 100px; height:30px;">
</tr>
<tr>
<textarea maxlength = "200" name="content" style="font-size: 20px;width: 300px; height: 40px;"></textarea>
</tr>
<tr>
<select name="priority" style="font-size:20px; width: 100px; height:30px;">
<option value="">
<option value="1">1
<option value="2">2
<option value="3">3 
<option value="4">4
<option value="5">5 
</select>
</tr>
<tr>
<input type="submit" name="Put_list" value="リストに追加" class="button">
</tr>
</table>
</form>
<br><br>


<div style="width:1100px; height:500px; background-color:orange; float:center;">
<div style="width:1000px; height:500px; background-color:orange; float:left;">
 <a align="center" style="font-weight: bold; font-size: 30px;">・現在のリスト</a>

<br>
<div id="sort"></div>
<script type="text/javascript">
sort_day();
</script> 
 
 <table style="font-size: 40px;" cellspacing="30">
  <tr>
  <td>
   ・<span id="plan0"></span>
  </td>
  </tr>
  <tr>
  <td>
   ・<span id="plan1"></span>
  </td>
  </tr>
  <tr>
  <td>
   ・<span id="plan2"></span>
  </td>
  </tr>
  <tr>
  <td>
   ・<span id="plan3"></span>
  </td>
  </tr>
 </table>
</div>
<div style="width:100px; height:500px; float:right; background-color: gainsboro;">
 <form name="List_change">
  <label><input type="radio" name="r1" value="day" onChange="sort_day()" checked="checked">日付順</label><br>
  <label><input type="radio" name="r1" value="priority" onChange="sort_priority()"> 優先度順</label>
 </form>
<form action="todolist_pri.php" method="POST">
<input type="submit" value="リスト一覧" class="button">
</form>
</div>
</div>
</body>
</html>

