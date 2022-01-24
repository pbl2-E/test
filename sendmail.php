<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php

function signupError(){
    echo "そのユーザー名は既に存在します<br>";
    echo "<a href=signup.php>戻る</a>";
}

signupCheck();
function signupCheck(){

$email = $_POST['address'];
$password = $_POST['password'];


$canma = ',';
$ans = $email;

$i = 0;
 //読み込みモードでファイルを開く
$fp = fopen("passmail1.txt", "r");
 //ファイルを１行ずつ取得する
while ($line = fgets($fp)){
 $trim = rtrim($line);
 $wpcontentpass = mb_strstr($trim, ',', true);
 if($wpcontentpass == $ans){
     signupError();
     $i++;
 }
}
   if($i == 0){
           $pass = $_POST['password'];
    $email = $_POST['address'];
    $from ="sample@example.com"; //差出人のメールアドレスをここに記入して使用
    $header = "From: $from\n";
    $header .= "Cc: $from\n";
    $sendmail_param = "-f$from";
    $subject = '登録完了';
    $body = "登録が完了しました.\n\n";
    if( mb_send_mail($email, $subject, $body, $header, $sendmail_param) ){
     echo '登録を受け付けました。<br>'."\n";

     echo '<form action="signup_complete.php" method="POST">'."\n";
     echo '<br><input type="submit" value="次へ"></form>'."\n";

    }else{
     echo 'メールの送信に失敗しました。<br>'."\n";
    }

    $f = fopen("passmail1.txt","a+" );
    fputs($f, $email);
    fputs($f, ",");
    fputs($f, $pass);
    fputs($f, "\n");
    fclose($f);
   }
fclose($fp);
}
?>

</body>
</html>
