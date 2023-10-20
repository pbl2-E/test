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
  .font1{
    font-size: 20px;
    font-weight: bold;
    padding-right: 110px;
  }
  .font2{
    font-size: 15px;
    padding-right: 100px;
  }
  .tasukuitiran{
    font-family: ヒラギノ角ゴシック;
    font-size: 20px;
    font-weight: bold;
    color: #0096c7;
  }
  .hide{
    display:none;
  }
  table{
    width: 600px;
    padding: 3px;
    border-collapse: collapse;
    border: solid 2px skyblue;/*表全体を線で囲う*/
    text-align: center;
  }
  table th {/*table内のthに対して*/
    width: 200px;
    padding: 3px 10px;/*上下3pxで左右10px*/
    border: solid 2px skyblue;/*実線 1px 黒*/
    background: #EBFDFF;/*背景色*/
  }
  table td {/*table内のtdに対して*/
    padding: 3px 10px;/*上下3pxで左右10px*/
    border: dashed 1px skyblue;/*点線 1px 黒*/
  }
</style>
</head>
<body>
  <font class="font1">Goal-achieving support app</font><br>
  <font class="tasukuitiran">タスク削除</font><br>
  <br>
  <br>
  <br>
  <br>
  <div align="center">
    <table>
      <form action="" method= "post">
        <?php
        $before="";
        $after="";
        $switch="";
        session_start();

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
          //echo($file);
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
          $switch=1;
        }

        echo "<tr>";
        echo "<th>";
        echo 'タスク名';
        echo "</th>";
        echo "<td>";
        echo($task_name);
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo '期限';
        echo "</th>";
        echo "<td>";
        echo($deadline_year); echo '/';
        echo($deadline_month); echo '/';
        echo($deadline_day);
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>";
        echo '頻度';
        echo "</th>";
        echo "<td>";
        echo ($memo);
        echo "</td>";
        echo "</tr>";

        echo("<input type=hidden name=task_name value=$task_nameP>");
        if ($switch != 1) $before="hide";
        if ($switch == 1) $after="hide";
        ?>

      </table>
      <font class="<?PHP echo $before; ?>">タスクを削除しました！</font><br>
      <br>
      <input type ="button" onclick="location.href='home_test2.php'" value="戻る">
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      <input type="hidden" name="del">
      <input type="submit" value="削除" class="<?PHP echo $after; ?>">
    </form>
  </div>
</body>
</html>
