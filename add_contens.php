<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<div style="align:center;">内容を登録いたしました。</div>
<?php

 $contents_name = $_POST['contents_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $file = $_POST['task_name'].".txt";
 $memo = $_POST['memo'];

 $fw = fopen($file, "a");
 fwrite($fw, $contents_name.",".$deadline_year.",".$deadline_month.",".$deadline_day.",".$memo."\n");
 fclose($fw);
 echo("\n".$contents_name."を登録しました\n");
?>
</body>
</html>