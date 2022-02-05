<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script>
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
  }
  .tasukuitiran{
    font-family: ヒラギノ角ゴシック;
    font-size: 20px;
    font-weight: bold;
    color: #0096c7;
  }
  table{
    width: 1000px;
    padding: 3px;
    border-collapse: collapse;
    border: solid 2px skyblue;/*表全体を線で囲う*/
    text-align: center;
  }
  table th {/*table内のtdに対して*/
    padding: 3px 10px;/*上下3pxで左右10px*/
    border: solid 2px skyblue;/*実線 1px 黒*/
    background: #EBFDFF;/*背景色*/
  }
  .tabletask {
    width: 300px;
  }
  .tabledate {
    width: 150px;
  }
  .tablehindo {
    width: 300px;
  }
  .tabledelete {
    width: 150px;
  }
  table td {/*table内のtdに対して*/
    padding: 3px 10px;/*上下3pxで左右10px*/
    border: dashed 1px skyblue;/*点線 1px 黒*/
  }
  </style>
</head>
<body>
  <font class="font1">Goal-achieving support app</font><br>
  <font class="tasukuitiran">内容一覧</font><br>
  <br>
  <br>
  <br>
  <br>
  <div align="center">
    <div style="width: 1000px; border: 1px solid #00b4d8;">
      <?php
      $task_name = $_GET['file_name'];
      //echo $task_name;  //_test.txtが表示
      list($file_name,$trush) = explode("_",$task_name,2);
      echo ("<h3>".$file_name."</h3>");

      //echo("<a href='http://sshg.cs.ehime-u.ac.jp/~g428miyo/pbl2/port_contents.php?file_name=$file_name'>追加</a>");
      $URL = "http://sshg.cs.ehime-u.ac.jp/~g428miyo/pbl2/port_contents.php?file_name=$file_name";
      ?>
    </div>
    <br>
    <input type="button" value="内容追加" onClick="location.href='<?php echo $URL; ?>'">
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <input type="button" value="戻る" onClick="location.href='home_test2.php'">
    <br>
    <br>
    <?php
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
    ?>

    <table>
      <tr>
        <th class="tabletask">内容</th>
        <th class="tabledate">期限</th>
        <th class="tablehindo">頻度</th>
        <th class="tabledelete">削除</th>
      </tr>
      <form action="" method="POST">
        <?php
        //ファイルの要素数をカウントしていて削除時に空白行が入ってしまうのでここより前に削除
        $count = count( file( $task_name ) );

        //ファイルをここで開くのでここより前に削除機能

        $fw = file_get_contents($task_name);
        //$fw = $task_name
        list($task, $con) = explode("\n", $fw, 2);
        //$task = タスクデータ,$con = コンテンツデータ全部

        $f = fopen($task_name, "r");

        for($i2 = 0; $i2 < $count; $i2++){
          $line[$i2] = fgets($f);
          list($name[$i2],$deadline_year[$i2],$deadline_month[$i2],$deadline_day[$i2],$memo[$i2]) = explode(",",$line[$i2]);
          //データを細かく
        }

        for($s = 1; $s < $count; $s++){
          echo "<tr>";
          echo "<td>";
          echo ($name[$s]);
          echo "</td>";
          echo "<td>";
          echo '<font>',$deadline_year[$s],'</font>';
          echo  ("/");
          echo '<font>',$deadline_month[$s],'</font>';
          echo  ("/");
          echo '<font>',$deadline_day[$s],'</font>';
          echo "</td>";

          if($memo != null){
            echo "<td>";
            echo '<font>',$memo[$s],'</font>';
            echo "</td>";
          }

          else if($memo == null){
            echo "<td>";
            echo  ("未定");
            echo "</td>";
          }
          echo "<td>";
          echo ("<button type=submit name=del value=$s>削除</button><br>");
          echo "</td>";
          echo "</tr>";
        }

        for($t = 1; $t < $count; $t++){
          list($con2[$t], $bad) = explode(",", $line[$t],2);
        }

        fclose($f);

        echo("<input type=hidden name=file_name value=$file_name>");
        ?>
      </form>
    </table>
  </body>
  </html>
