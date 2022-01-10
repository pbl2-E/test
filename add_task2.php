<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<div style="align:center;">タスクを登録いたしました。</div>
<?php

 $task_name = $_POST['task_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $file = $task_name.".txt";
 $memo = $_POST['memo'];
 echo("\n".$file."を作成しました\n");

 $fw = fopen($file, "x");
 fwrite($fw, $task_name.",".$deadline_year.",".$deadline_month.",".$deadline_day.",".$memo."\n");
 fclose($fw);
 $fo = fopen("file_operatr.txt", "a");
 fwrite($fo, $file."\n");
 fclose($fo);
?>
</body>
</html>
