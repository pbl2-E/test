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
 $memo = $_POST['memo'];
 echo("\n".$file."を作成しました<br>");
 $ID = $_SESSION['ID'];
 list($id,$pas) =explode(",",$ID);
 $file = $task_name."_".$id.".txt";

 $fw = fopen($file, "x");
 chmod($file, 0666);
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
<a href="http://sshg.cs.ehime-u.ac.jp/~g475yama/pbl2/home_test2.php">ホームへGO！</a>
</body>
</html>