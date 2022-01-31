<!DOCUMENT html>
<html lang="ja">
<head>
<title>タスク登録</title>
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
                        document.getElementById("message").innerHTML = '<font color="red">タスク名、期限を入力してください</font>'
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
<h1 align="center">新規タスク登録</h1>
<br>
<br>
<form action="add_task2.php" method="POST">
<table border="1" cellpadding=1 cellspacing=1 align="center" width="500" height="250" bgcolor=" #f2f2f2">
<td align="center" height="40">
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
タスク名　：<input type="text" name="task_name" class="task" size=15 ><tr></td><tr>
<td align="center">期限　:<select name="deadline_year" class="deadline">
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
</td>
<tr>
<td height="40" align="center">
頻度　：<textarea name="memo" rows=1 cols=25 class="memo"></textarea></td><tr>
<td align="center">
<input type="button" value="　戻る　" onclick="HomePage()" class="back">
<input type="submit" value="　追加　" onclick="return AddCheck()" class="add"></td>
</div>
</table>
</form>
</body>
</html>
