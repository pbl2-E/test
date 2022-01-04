<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
<title>To do リスト</title>
<style type="text/css">
body{
    background-color: #eee8aa;
}

.todotytle{
    background-color: #fff0f5;     //リスト一覧の文字のcss
}

.form1{
    padding-right: 200px
}

.text{
    font-size: 40px;
    padding-left: 300px;
}

.text p{
   text-align: left;
   margin: 0em 0px;
}

.cp_ipselect {
position: relative;
width: 90%;
margin: 2em auto;
text-align: center;
}
.cp_sl06 {
position: relative;
font-family: inherit;
background-color: transparent;
width: 100%;
padding: 10px 10px 10px 0;
font-size: 18px;
border-radius: 0;
border: none;
border-bottom: 1px solid rgba(0,0,0, 0.3);
}
.cp_sl06:focus {
outline: none;
border-bottom: 1px solid rgba(0,0,0, 0);
}
.cp_ipselect .cp_sl06 {
appearance: none;
-webkit-appearance:none
}
.cp_ipselect select::-ms-expand {
display: none;
}
.cp_ipselect:after {
position: absolute;
top: 18px;
right: 10px;
width: 0;
height: 0;
padding: 0;
content: '';
border-left: 6px solid transparent;
border-right: 6px solid transparent;
border-top: 6px solid rgba(0, 0, 0, 0.3);
pointer-events: none;
}
.cp_sl06_selectlabel {
color: rgba(0,0,0, 0.5);
font-size: 18px;
font-weight: normal;
position: absolute;
pointer-events: none;
left: 0;
top: 10px;
transition: 0.2s ease all;
}
.cp_sl06:focus ~ .cp_sl06_selectlabel, .cp_sl06:valid ~ .cp_sl06_selectlabel {
color: #da3c41;
top: -20px;
transition: 0.2s ease all;
font-size: 14px;
}
.cp_sl06_selectbar {
position: relative;
display: block;
width: 100%;
}
.cp_sl06_selectbar:before, .cp_sl06_selectbar:after {
content: '';
height: 2px;
width: 0;
bottom: 1px;
position: absolute;
background: #da3c41;
transition: 0.2s ease all;
}
.cp_sl06_selectbar:before {
left: 50%;
}
.cp_sl06_selectbar:after {
right: 50%;
}
.cp_sl06:focus ~ .cp_sl06_selectbar:before, .cp_sl06:focus ~ .cp_sl06_selectbar:after {
width: 50%;
}
.cp_sl06_highlight {
position: absolute;
top: 25%;
left: 0;
pointer-events: none;
opacity: 0.5;
}
</style>

</head>
<body>
<a href="javascript:history.back()">←戻る</a>
<a target="_self" href="home.html">カレンダー</a>
<a target="_self" href="add_todo.php">ToDo List</a>

<h2 align="center">リスト一覧 : 優先度順</h2>
<div class="cp_ipselect">
<select class="cp_sl06" onchange="location.href=value;"  required>
<option value="" hidden disabled selected></option>
<option value="todolist_date.php">日付順</option>
<option value="todolist_pri.php">優先度順</option>
</select>
<span class="cp_sl06_highlight"></span>
<span class="cp_sl06_selectbar"></span>
<label class="cp_sl06_selectlabel">表示</label>
</div>

<div class="text">
<?php
function pri_sort(){
    $f = file_get_contents("Content.txt");
    $item = explode("\n", $f);
    for($i = 0; $i < count($item) - 1; $i++){
        list($date[$i], $body[$i], $pri[$i]) = explode(",", $item[$i], 3);  //itemを日付と内容、優先度に分割する
        list($year[$i], $month[$i], $day[$i]) = explode("/", $date[$i], 3);    //dateを年と月、日で分割する
        $com[$i] = (int)$year[$i]*365 + (int)$month[$i]*31 + (int)$day[$i];   //比較用の配列にそのitemの日付の大きさを代入

    }

    for($i=0; $i<count($item)-1; $i++){
        for($j=$i+1; $j<count($item)-1; $j++){
            if($com[$i] > $com[$j]){
                $tmp = $com[$i];
                $tmp1 = $item[$i];
                $com[$i] = $com[$j];
                $item[$i] = $item[$j];
                $com[$j] = $tmp;
                $item[$j] = $tmp1;
            }
        }
    }



    for($i = 0; $i < count($item) - 1; $i++){
        list($date[$i], $body[$i], $pri[$i]) = explode(",", $item[$i], 3);  //itemを日付と内容、優先度に分割する
   }

    for($i = 0; $i < count($item)-1; $i++){
        for($j = $i+1; $j < count($item); $j++){
            if((int)$pri[$i] < (int)$pri[$j]){
                $tmp = $date[$i];
                $date[$i] = $date[$j];
                $date[$j] = $tmp;
                $tmp = $body[$i];
                $body[$i] = $body[$j];
                $body[$j] = $tmp;
                $tmp = $pri[$i];
                $pri[$i] = $pri[$j];
                $pri[$j] = $tmp;
            }
        }
    }

    for($i = 0; $i < count($item)-1; $i++){
        echo "<p>・$date[$i]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$body[$i]<br></p>";
    }
}
pri_sort()
?>
</div>
</form>
</body>
</html>
