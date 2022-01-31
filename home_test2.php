<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<div style="align:center;">タスク一覧</div>
<form action="delete.php" method="POST">
<?php session_start();
 $f = file_get_contents("file_operator.txt");
 $line = explode("\n", $f);
 for($i = 0; $i < count($line); $i++){
  list($item[$i],$id[$i]) = explode(",",$line[$i],2);
 }
 echo($_SESSION['ID']."<br>");
 $ID = $_SESSION['ID'];
 if($ID == null){
  $ID = "masaru,0913";
 }
 //上のはテスト用
 for($i = 0; $i < count($item) - 1; $i++){
  list($item_con,$yojou) = explode(".",$item[$i],2);
  //こいつをPOSTするとユーザー名がくっついた状態の正しいファイル名が送れるぞ♥
  list($item_name,$pas) = explode("_",$item_con);
  //echo($id[$i]);
  //list($user_name,$user_pas) = explode(",",$ID);
  if($id[$i] == $ID){
   echo ("<font color=#008000><b>".($i+1). " <a href='http://sshg.cs.ehime-u.ac.jp/~g475yama/pbl2/ContentsPage2.php?file_name=$item[$i]'>".$item_name."</a> : ");
  }
  $fw = file_get_contents($item[$i]);
  list($task, $con) = explode("\n", $fw, 2);
  list($task_name,$deadline_year,$deadline_month,$deadline_day,$memo) = explode(",",$task);
  if($memo == null){
   $memo = "未定";
  }
  if($id[$i] == $ID){
  echo($deadline_year.",".$deadline_month.",".$deadline_day." : ".$memo." : ");
  }
  $ach = $_SESSION['ach'];
  if($ach == null){
   $ach = "達成度はまだ未実装";
  }
  if($id[$i] == $ID){
   echo($ach." : </b></font><button type=submit name=task_name value=>削除</button><br>");
  }
 }
 echo ("できてるかい？<br>")
?>
<a href="http://sshg.cs.ehime-u.ac.jp/~g475yama/pbl2/add_task.php">タスク追加はこっちだ</a>
</form>
</body>
</html>
