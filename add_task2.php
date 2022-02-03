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

$task_name = $_POST['task_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 $memo = $_POST['memo'];
 echo("\n".$task_name."を作成しました<br>");
 $ID = $_SESSION['ID'];
 list($id,$pas) =explode(",",$ID);
 $file = $task_name."_".$id.".txt";
 $kaburi = 0;

 if($task_name != null){
 $fw = fopen($file, "x");
 chmod($file, 0666);
 fwrite($fw, $task_name.",".$deadline_year.",".$deadline_month.",".$deadline_day.",".$memo."\n");
 fclose($fw);
 $f = fopen("file_operator.txt", "a");
 echo($f);
 if($f == null){
  echo("ファイル開けてねぇじゃん");
 }
 $ope = file_get_contents("file_operator.txt");
 $files = explode("\n",$ope);
 for($i = 1;$i < count($files);$i++){
  list($textfile,$user_info) = explode(",",$file[$i],2);
  echo($textfile." = ".$file[$i]."<br>");
  if($file == $textfile){
    $kaburi++;
  }
 }
 if($kaburi <= 0){
  fwrite($f, $file.",".$ID."\n");
 }else{
   echo("タスク内容名かぶってるって\n");
 }
 fclose($f);
 }else{
   echo("タスク名ないやん/n");
 }
 echo("かぶり変数は".$kaburi."<br>");
?>
<a href="http://sshg.cs.ehime-u.ac.jp/~g475yama/pbl2/home_test2.php">ホームへGO！</a>
</body>
</html>
