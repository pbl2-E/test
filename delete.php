<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<?php session_start();

 $task_name = $_POST['task_name'];
 $deadline_year = $_POST['deadline_year'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_day = $_POST['deadline_day'];
 //ここから
 $IDs = $SESSION['ID'];
 list($id,$password) = explode(",",$IDs);
 $file = $_POST['task_name']."_".$id.".txt";
 //ここまでいろってるで
 $memo = $_POST['memo'];

 //削除機能
 if(isset($_POST['del'])){
   unlink($file); //ファイルそのものはここで削除
   $file_name = "file_operator.txt";
   $fw = fopen("file_operator.txt", "r+");
   $value = file($file_name);//ファイル全体を一行ずつ配列で確保
   $i = 1;

   while($line = fgets($fw)){//何行目に該当するタスクのファイルがあるか探査
     $val = explode("," ,$line);
     if($val[0] == $file){//$val[0]に各列のタスク名ファイルが入る
         break;
     }
     else{
       $i= $i + 1; //$iに何行目にあるかを書いておく
     }
     echo $val[0]; echo '<br>';//後で消す

   }
   fclose(fw);
   $fw = fopen("file_operator.txt", "w");//いったんファイルを空白にする
   //rewind($fw); //ファイルポインタを最初の位置に戻す//ここいらない

   $arraycnt = count($value);  //配列の数をカウントする
   for($k=0;$k < $arraycnt;$k++){
     if($i == $k+1){//消すべきファイル名をスキップしてそれ以外を書き込み
       continue;
     }else{
 fwrite($fw, $value[$k]);
     }
 }
   fclose($fw);
 }

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
<input type ="button" onclick="location.href='home_test2.php'" value="戻る">
<form action="" method= "post">
  <input type="hidden" name="del">
  <input type="submit" value="削除">
</form>

</html>