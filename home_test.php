<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<div style="align:center;">タスク一覧</div>
<?php session_start();
 $f = file_get_contents("file_operator.txt");
 $item = explode("\n", $f);

 for($i = 0; $i < count($item) - 1; $i++){
  echo ("<font color=#008000><b>".($i+1)." $item[$i] : ");
  $fw = file_get_contents($item[$i]);
  list($task, $con) = explode("\n", $fw, 2);
  list($task_name,$deadline_year,$deadline_month,$deadline_day,$memo) = explode(",",$task);
  if($memo == ""){
   $memo = "未定";
  }
  echo($deadline_year.",".$deadline_month.",".$deadline_day." : ".$memo." : ");
  $ach = $_SESSION['ach_per'];
  if($ach == null){
   $ach = "達成度はまだ未実装";
  }
  echo($ach." : </b></font><input type=button value=削除><br>");
 }
 echo ("できてるかい？")
?>
</body>
</html>
