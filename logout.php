<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()])==true){
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <title>ログアウト</title>
</head>
<body>
  <h1>
    <font size='5'>ログアウトしました</font>
  </h1>
  <p><a href='login.php'>ログインページに戻る</a></p>
</body>
</html>
