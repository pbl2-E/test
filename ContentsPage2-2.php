<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script>
</head>
<body align="center">
<div id="kigen" align="center"></div>
<br><br>
<form action="" method="POST">
<?php

$task_name = $_GET['file_name'];

list($file_name,$trush) = explode("_",$task_name,2);
echo ("<font size=5 color=#008000>".$file_name."</font>"."<br><br>");


$count = count( file( $task_name ) );
$fw = file_get_contents($task_name);
list($task, $con) = explode("\n", $fw, 2);

$f = fopen($task_name, "r");

for($i2 = 0; $i2 < $count; $i2++){
$line[$i2] = fgets($f);
 }
 
 //削除機能
 if(isset($_POST['del'])){
   //echo($file);
   
   $file_name2 = $task_name;
   $fp = fopen($file_name2, "r+");
   $value = file($file_name2);//ファイル全体を一行ずつ配列で確保
   $i = $_POST['del'];
     //echo $val[0]; echo '<br>';//後で消す
   
   fclose($fp);
   $fp = fopen($task_name, "w");//いったんファイルを空白にする
   //rewind($fp); //ファイルポインタを最初の位置に戻す//ここいらない

   $arraycnt = count($value);  //配列の数をカウントする
   fwrite($fp,$value[0]);
   for($k=1;$k < $arraycnt;$k++){
     if($i == $k){//消すべきファイル名をスキップしてそれ以外を書き込み
       continue;
     }else{
       fwrite($fp, $value[$k]);
     }
 }
   fclose($fp);
 }

for($s = 1; $s < $count; $s++){
echo ($line[$s]."<input type=submit value=削除><input type=hidden name=del value=$s><br>");
}

for($t = 1; $t < $count; $t++){
list($con2[$t], $bad) = explode(",", $line[$t],2);
}

echo("<a href='http://sshg.cs.ehime-u.ac.jp/~g428miyo/pbl2/port_contents.php?file_name=$file_name'>追加</a>");

fclose($f);

echo("<input type=hidden name=file_name value=$file_name>");

 

?>

<br>
<br>
<input type="button" value="戻る" style="width:100px; height:50px" onClick="location.href='home_test2.php'">
</form>
</body>
</html>
