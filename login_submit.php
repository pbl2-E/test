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
   echo "メールアドレスもしくはパスワードが違います<br />";
   echo "<a href=login.php>戻る</a>";
}

LoginCheck();
function LoginCheck(){

$email = $_POST['email'];
$password = $_POST['password'];


$canma = ',';
$ans = $email.$canma.$password;


 //読み込みモードでファイルを開く
$fp = fopen("passmail1.txt", "r");
 //ファイルを１行ずつ取得する
while ($line = fgets($fp)){
 $trim = rtrim($line);
 console_log($trim);
 console_log($ans);
 if($trim == $ans){
   header('Location: HomePage.php');
   return;
 }
}
   if($trim != $ans){
      LoginError();
   }
fclose($fp);
}
?>

</body>
</html>
