<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script>
</head>
<body align="center">
<div id="kigen" align="center"></div>
<br><br>
<form action="port_contents.php" method="GET">
<?php

$task_name = $_GET['file_name'];

list($file_name,$trush) = explode(".",$task_name,2);
echo ("<font size=5 color=#008000>".$file_name."</font>"."<br><br>");


$count = count( file( $task_name ) );
$fw = file_get_contents($task_name);
list($task, $con) = explode("\n", $fw, 2);

$f = fopen($task_name, "r");

for($i = 0; $i < $count; $i++){
$line[$i] = fgets($f);
 }

for($s = 1; $s < $count; $s++){
echo ($line[$s]."<input type=button name=delete value=削除><br>");
}

fclose($f);

echo("<input type=hidden name=file_name value=$file_name>");
?>

<br>
<br>
<input type="submit" name="submit" value="追加" style="width:100px; height:50px" onClick="location.href='port_contents.php'">
<input type="button" value="戻る" style="width:100px; height:50px" onClick="location.href='testhomepage1.php'">
</form>
</form>
</body>
</html>
