<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<div style="align:center;">タスクを登録いたしました。</div>
<?php session_start();

 $task_name = $_POST['task_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $file = $task_name.".txt";
 $memo = $_POST['memo'];
 echo("\n".$file."を作成しました<br>");
 $ID = $_SESSION['ID'];

 $fw = fopen($file, "x");
 fwrite($fw, $task_name.",".$deadline_year.",".$deadline_month.",".$deadline_day.",".$memo."\n");
 fclose($fw);
 $f = fopen("file_operator.txt", "a");
 echo($f);
 if($f == null){
  echo("ファイル開けてねぇじゃん");
 }
 fwrite($f, $file.",".$ID."\n");
 fclose($f);
?>
</body>
</html>

