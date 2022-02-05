<!DOCUMENT html>
<html lang="ja">
<head>
<title>内容登録</title>
<style>
body {
  background-image: url(mizuirohaikeiy3.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
</style>
<meta charset="UTF-8">
<script type="text/javascript">
function HomePage(){
         location.href='home_test2.php';
}
function AddCheck(){
         task_name = document.getElementById("task_name").value;
         deadline_year = document.getElementById("deadline_year").value;
         deadline_month = document.getElementById("deadline_month").value;
         deadline_day = document.getElementById("deadline_day").value;
         if(task_name=="" || deadline_year=="" || deadline_month=="" || deadline_day==""){
                     // 関数AddErrorの機能を併合
                        document.getElementById("message").innerHTML = '<font color="red">内容名、期限を入力してください</font>'
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
<h1 align="center">新規内容登録</h1>
<br>
<br>
<form action="add_contents.php" method="POST">
<div align="center">
<table border="1" cellpadding=1 cellspacing=1 align="center" width="500" height="250" bgcolor=" #f2f2f2">
<td align="center" height="40">
<br>
タスク名　：
<?php
 $task_name = $_GET['file_name'];
 if($task_name == null){
  $task_name = "test1";
}
session_start();
$_SESSION['task_name'] = $task_name;
echo($task_name);
?>
<br><br>
<style>
.task{
   display: inline-block;
   width: 10em;
   max-width: 100%;
   padding: 0.5em;
   border: 1px solid #999;
   box-sizing: border-box;
   margin: 0.5em 0;
}
.deadline{
   display: inline-block;
   width: 7em;
   max-width: 100%;
   padding: 0.5em;
   border: 1px solid #999;
   box-sizing: border-box;
   margin: 0.5em 0;
}
.deadline2{
   display: inline-block;
   width: 6em;
   max-width: 100%;
   padding: 0.5em;
   border: 1px solid #999;
   box-sizing: border-box;
   margin: 0.5em 0;
}
.memo{
   display: inline-block;
   width: 20em;
   max-width: 100%;
   padding: 0.5em;
   border: 1px solid #999;
   box-sizing: border-box;
   margin: 0.5em 0;
}
.back{
   width: 100px;
   padding: 10px;
   box-sizing: border-box;
   border: 1px solid #68779a;
   background: #cbe8fa;
    cursor: pointer;
}
.add{
    width: 100px;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #68779a;
    background: #cbe8fa;
    cursor: pointer;
}
</style>
内容　：<input type="text" name="contents_name" class="task" size=15　minlength="1" required><br><br>
期限：<select name="deadline_year" class="deadline">
<option>2021</option>
<option>2022</option>
<option>2023</option>
</select>年
<select name="deadline_month" class="deadline2">
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
<select name="deadline_day" class="deadline2">
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
　頻度　：<textarea name="memo" class="memo" rows=1 cols=25></textarea><br><br>
<input type="button" value="　ホームへ　" onclick="HomePage()" class="back">
<input type="submit" value="　追加　" onclick="return AddCheck()" class="add"><br><br>
</div>
</table>
</form>
</body>
</html>
