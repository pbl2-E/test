<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php

function console_log( $data ){
echo '<script>';
echo 'console.log('. json_encode( $data ) .')';
echo '</script>';
}

function LoginError(){
   echo "メールアドレスもしくはパスワードが入力されていません<br />";
   echo "<a href=login.php>戻る</a>";
}

LoginCheck();
function LoginCheck(){
session_start();
$email = $_POST['email'];
$password = $_POST['password'];


$canma = ',';
$ans = $email.$canma.$password;


$ID = $ans;
$_SESSION['ID'] = $ID;

 //読み込みモードでファイルを開く
$fp = fopen("passmail.txt", "r");
 //ファイルを１行ずつ取得する
while ($line = fgets($fp)){
 $trim = rtrim($line);
 console_log($trim);
 console_log($ans);
 if($trim == $ans){
   header('Location: home_test2.php');
   return;
 }
}
   LoginError();
fclose($fp);
}
?>

</body>
</html>
