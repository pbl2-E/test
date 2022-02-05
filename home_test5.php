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
  .logout{
    align: 0 center;
    padding-top:1px;
    padding-bottom:1px;
  }
  .add{
    padding-right: 680px;
  }
  .hide{
    display:none;
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
    width: 100px;
  }
  .tablehindo {
    width: 300px;
  }
  .tabletassei {
    width: 100px;
  }
  .tabledelete {
    width: 100px;
  }
  table td {/*table内のtdに対して*/
    padding: 3px 10px;/*上下3pxで左右10px*/
    border: dashed 1px skyblue;/*点線 1px 黒*/
  }
</style>
</head>
<body>
  <font class="font1">Goal-achieving support app</font><br>
  <div class="logout">
    <font class="tasukuitiran">タスク一覧</font>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <input type="button" value="ログアウト" onClick="location.href='logout.php'"><br>
  </div>
  <font >ようこそ</font>
  <?php session_start();
  $f = file_get_contents("file_operator.txt");
  $line = explode("\n", $f);
  for($i = 0; $i < count($line); $i++){
    list($item[$i],$id[$i]) = explode(",",$line[$i],2);
  }
  $ID = $_SESSION['ID'];
  list($user_name,$password) = explode(",",$ID,2);
  echo htmlspecialchars($user_name);
  echo("<br>");
  ?>
  <?php
  if($ID == null){
    echo ("ログアウトからログインし直してください<br>");
  }
  ?>
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
    <div class="add">
      <?php
      //if($ID != null){echo ("ログイン！<br>");}
      $class="";
      if ($ID == null) $class="hide";
      ?>
      <input type="button" value="タスク追加" onClick="location.href='add_task.php'" id="accept" class="<?PHP echo $class; ?>">
    </div>
    <br>
    <form action="delete.php" method="POST">
      <table>
        <tr>
          <th class="tabletask">タスク</th>
          <th class="tabledate">期限</th>
          <th class="tablehindo">頻度</th>
          <th class="tabletassei">達成度</th>
          <th class="tabledelete">削除</th>
        </tr>

        <?php
        for($i = 0; $i < count($item) - 1; $i++){
          list($item_con,$yojou) = explode(".",$item[$i],2);
          //こいつをPOSTするとユーザー名がくっついた状態の正しいファイル名が送れるぞ♥
          list($item_name,$pas) = explode("_",$item_con);
          //echo($id[$i]);
          //list($user_name,$user_pas) = explode(",",$ID);
          if($id[$i] == $ID){
            echo "<tr>";
            echo "<td>";
            echo (
              /*"<font color=#008000><b>".($i+1). */
              "<a href='http://sshg.cs.ehime-u.ac.jp/~g428miyo/pbl2/ContentsPage2.php?file_name=$item[$i]'>");
            echo htmlspecialchars($item_name);
            echo("</a>");
            echo "</td>";

            $fw = file_get_contents($item[$i]);
            list($task, $con) = explode("\n", $fw, 2);
            list($task_name,$deadline_year,$deadline_month,$deadline_day,$memo) = explode(",",$task);

            echo "<td>";
            echo '<font>';
            echo htmlspecialchars($deadline_year);
            echo'</font>';
            echo  ("/");
            echo '<font>',
            echo htmlspecialchars($deadline_month);
            echo'</font>';
            echo  ("/");
            echo '<font>',
            echo htmlspecialchars($deadline_day);
            echo'</font>';
            echo "</td>";

            if($memo != null){
              echo "<td>";
              echo '<font>',$memo,'</font>';
              echo "</td>";
            }

            else if($memo == null){
              echo "<td>";
              echo  ("未定");
              echo "</td>";
            }


            $ach = $_SESSION['ach'];
            if($ach == null){
              echo "<td>";
              //echo ("✓");
              echo("<a href=https://search.yahoo.co.jp/search?p=$task_name>調べちゃおう</a>");
              echo "</td>";
            }
            if($id[$i] == $ID){
              echo "<td>";
              echo($ach."</b></font><button type=submit name=task_name value=$task_name>削除</button><br>");
              echo "</td>";
            }
            echo "</tr>";
          }
        }
        ?>
      </table>
    </form>
  </div>
</body>
</html>
