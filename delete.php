<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<form action="" method= "post">

<table border="1">
<?php session_start();

 $task_nameP = $_POST['task_name'];

//ここから
 $IDs = $_SESSION['ID'];
 list($id,$password) = explode(",",$IDs);
 $file = $_POST['task_name']."_".$id.".txt";
 //ここまでいろってるで
 //$file = $_POST['task_name'].".txt";//session関連よくわかってないので不要であれば、こっちを消してください
 $fp = fopen($file , "r");
 $line2 = fgets($fp);
 $ymd = explode(",",$line2);
 $task_name = $ymd[0];
 $deadline_year = $ymd[1];
 $deadline_month = $ymd[2];
 $deadline_day = $ymd[3];
 $memo = $ymd[4];
 fclose($fp);

 //削除機能
 if(isset($_POST['del'])){
   echo($file);
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
     //echo $val[0]; echo '<br>';//後で消す

   }
fclose($fw);
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

 echo'<tr>';
 echo ('タスク名 : ');
 echo($task_name);
 echo'</tr>';
 echo'<tr>';
 echo '期限 : ';
 echo($deadline_year); echo '年';
 echo($deadline_month); echo '月';
 echo($deadline_day); echo '日';
 echo'</tr>';
 echo'<tr>';
 echo '頻度 : ';
 echo ($memo);
 echo'</tr>';


 echo("<input type=hidden name=task_name value=$task_nameP>");

?>
</table>

</body>
<input type ="button" onclick="location.href='home_test2.php'" value="戻る">
  <input type="hidden" name="del">
  <input type="submit" value="削除">
</form>

</html>
