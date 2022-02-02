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
  }
  .tasukuitiran{
    font-family: ヒラギノ角ゴシック;
    font-size: 20px;
    font-weight: bold;
    color: #0096c7;
  }
  .test{
    font-size:20px;
    line-height:0.95em;
    font-weight:bold;
    color: transparent;
    -webkit-text-stroke: 0.02em #0096c7;
  }
</style>
</head>
<body>
  <font class="font1">Goal-achieving support app</font>
  <br>
  <font class="tasukuitiran">タスク一覧</font>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div align="center">
    <div style="width: 1000px; border: 1px solid #00b4d8;">
      <h3 id = "heading">Message</h3>
      <script type="text/javascript">
      var message = "ヒント：";
      var city = ["今日も頑張りましょう！","君ならできる！","見落としはないかな？頑張れ！","少年よ大志を抱け","夢に向かって"];
      document.getElementById("heading").innerHTML = message + city[Math.floor(Math.random() * 5)];
      </script>
    </div>
    <br>
    <br>
    <br>
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
      ?>

      <table align="center" cellpadding=3 cellspacing=0 border=1 width=800px >
        <tr>
          <td>タスク</td>
          <td>期限</td>
          <td>頻度</td>
          <td>達成度</td>
          <td>削除</td>
        </tr>
        <?php
        for($i = 0; $i < count($item) - 1; $i++){
          echo "<tr>";
          list($item_con,$yojou) = explode(".",$item[$i],2);
          //こいつをPOSTするとユーザー名がくっついた状態の正しいファイル名が送れるぞ♥
          list($item_name,$pas) = explode("_",$item_con);
          //echo($id[$i]);
          //list($user_name,$user_pas) = explode(",",$ID);
          if($id[$i] == $ID){
            echo "<td>";
            echo ("<font color=#008000><b>".($i+1). " <a href='http://sshg.cs.ehime-u.ac.jp/~g428miyo/pbl2/ContentsPage2.php?file_name=$item[$i]'>".$item_name."</a> : ");
            echo "</td>";
          }


          $fw = file_get_contents($item[$i]);
          list($task, $con) = explode("\n", $fw, 2);
          list($task_name,$deadline_year,$deadline_month,$deadline_day,$memo) = explode(",",$task);

          $task_date = explode(",",$task);
          echo "<td>";
          echo '<font>',$task_date[1],'</font>';
          echo ("/");
          echo '<font>',$task_date[2],'</font>';
          echo ("/");
          echo '<font>',$task_date[3],'</font>';
          echo "</td>";

          echo "<td>";
          echo '<font>',$task_date[4],'</font>';
          echo "</td>";

          if($task_date[4] == null){
            echo "<td>";
            echo("未定");
            echo "</td>";
          }

          if($id[$i] == $ID){
            echo($deadline_year.",".$deadline_month.",".$deadline_day." : ".$memo." : ");
          }
          $ach = $_SESSION['ach'];
          if($ach == null){
            echo "<td>";
            echo ("✓");
            echo "</td>";
          }
          if($id[$i] == $ID){
            echo "<td>";
            echo($ach." : </b></font><button type=submit name=task_name value=>削除</button><br>");
            echo "</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
      <?php
      echo ("できてるかい？<br>")
      ?>
    </tr>
  </table>

  <a href="http://sshg.cs.ehime-u.ac.jp/~g428miyo/pbl2/add_task.php">タスク追加はこっちだ</a>
</form>
<input type="button" value="ログアウト" onClick="location.href='logout.php'">
</div>
</body>
</html>
