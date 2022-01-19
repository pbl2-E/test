<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()])==true){
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>

<!DOCTYPE html>
<html  lang="ja">
<head>
  <meta charset="UTF-8"/>
  <title>ログアウト</title>

  <style>
  .font1{
    font-size: 20px;
    font-weight: bold;
    padding-right: 110px;
  }
  .font2{
    font-size: 15px;
    padding-right: 100px;
  }
  </style>
</head>

<body>
  <div align="center">
    <br>
    <br>
    <br>
    <br>
    <br>
    <font class="font1">Goal-achieving support app</font><br>
    <br>
    <div style="padding: 50px; height: 400px; width: 300px; border: 1px solid #00b4d8;">
      <h1 align="center">
        <font color="#0096c7">
          ログアウト完了<br>&nbsp;
        </font>
      </h1>
      <br>
      <br>
      <br>
      <br>
      <a href='login.php'>ログインページに戻る</a>
    </div>
  </div>
</body>
</html>
