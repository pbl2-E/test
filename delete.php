<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<?php

 $task_name = $_POST['task_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $file = $_POST['task_name'].".txt";
 $memo = $_POST['memo'];

 $file = 'ab.txt';
 //削除機能
 if(isset($_POST['del'])){
   unlink($file);
 }


 //実験用後で消す
 $task_name = 'タスク１';
 $deadline_year = '2021';
 $deadline_month = '12';
 $deadline_day = '21';

 echo 'タスク名　:　';
 echo($task_name); echo '<br>';
 echo '期限　:　';
 echo($deadline_year); echo '年';
 echo($deadline_month); echo '月';
 echo($deadline_day); echo '日'; echo'<br>';
 echo '頻度　:　';
 echo ($memo); echo '<br>';



?>
</body>
<input type ="button" onclick="location.href='3.html'" value="戻る">

<form action="" method= "post">
  <input type="hidden" name="del">
  <input type="submit" value="削除">
</form>

</html>
