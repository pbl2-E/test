<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
<style>
body {
  background-image: url(mizuirohaikeiy3.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
</style>
</head>
<body>
<div style="align:center;">タスクを登録いたしました。</div>
<?php session_start();

 $contents_name = $_POST['contents_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $file = $_SESSION['task_name'];
 $IDs = $_SESSION['ID'];
 list($id,$pas) =explode(",",$IDs);
 list($file1,$file2) = explode(".",$file);
 $file = $file1."_".$id.$file2.".txt";
 $memo = $_POST['memo'];

 $fw = fopen($file, "a");
 fwrite($fw, $contents_name.",".$deadline_year.",".$deadline_month.",".$deadline_day.",".$memo."\n");
 fclose($fw);
 echo("\n".$contents_name."を".$file."に登録しました\n");
?>
<a href="http://sshg.cs.ehime-u.ac.jp/~g475yama/pbl2/home_test2.php">ホームへGO！</a><br>
</body>
</html>
