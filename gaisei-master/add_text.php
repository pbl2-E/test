<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
しばし俣れよ
<?php

 $task_name = $_POST['task_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $file = $task_name.".txt";
 $memo = $_POST['memo'];
 echo("\n".$file."をつくりてぇんだ\n");

 $fw = fopen($file, "w");
 chmod ($file,0666);
 fwrite($fw, $task_name.",".$deadline_year.",".$deadline_month.",".$deadline_day.",".$memo."\n");
 fclose($fw);
?>
</body>
</html>
