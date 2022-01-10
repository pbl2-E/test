<?php

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

  echo '<form action="signup_complete.html" method="POST">'."\n";
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

?>
