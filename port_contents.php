<!DOCUMENT html>
<html lang="ja">
<head>
<title>内容登録</title>
<meta charset="UTF-8">
<script type="text/javascript">
function HomePage(){
         location.href='Home1.php';
}
function AddCheck(){
         task_name = document.getElementById("task_name").value;
         deadline_year = document.getElementById("deadline_year").value;
         deadline_month = document.getElementById("deadline_month").value;
         deadline_day = document.getElementById("deadline_day").value;
         if(task_name=="" || deadline_year=="" || deadline_month=="" || deadline_day==""){
                     // 関数AddErrorの機能を併合
                        document.getElementById("message").innerHTML = '<font color="red">内容名、期\\
限を入力してください</font>'
                                                                     return false;
                                                                     }
                                                                     return true;
}
</script>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<form action="add_contents.php" method="POST">
<div align="center">
タスク名　：
<?php
 $task_name = $_POST['task_name'];
 if($task_name == null){
  $task_name = "名無し";
 }
 echo($task_name);
 echo("<div style=\"visibility: hidden;\" name=\"task_name\">".$task_name."</div>")
?>
<!--ここまででタスク名を受け取っていなければならない。これの前のページでtask_nameをPOSTしておいてほしい\
-->
<br><br>
内容　：<input type="text" name="contents_name" size=15><br><br>
期限：<select name="deadline_year">
<option>2021</option>
<option>2022</option>
<option>2023</option>
</select>年
<select name="deadline_month">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>
<select name="deadline_day">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<br><br>
　頻度　：<textarea name="memo" rows=2 cols=25></textarea><br><br>
<input type="button" value="　ホームに戻る　" onclick="HomePage()">　　<input type="submit" value="　追\
加　" onclick="return AddCheck()">
</div>
</form>
</body>
</html>
