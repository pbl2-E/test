<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style>
  body {
    background-image: url(mizuirohaikeiy3.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
  .hide{
    display:none;
  }
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
    <div style="padding: 50px; height: 400px; width:300px; border: 1px solid #00b4d8;">
      <h1 align="center">
        <font color="#0096c7">
          新規登録
        </font>
      </h1>
      <br>
      <br>
      <br>
      <?php
      $button="";
      function signupError(){
        echo "そのユーザー名は既に存在します<br>";
        //echo "<a href=signup.php>戻る</a>";
      }

      signupCheck();
      function signupCheck(){
        $email = $_POST['address'];
        $password = $_POST['password'];
        $canma = ',';
        $ans = $email;

        $i = 0;
        //読み込みモードでファイルを開く
        $fp = fopen("passmail.txt", "r");
        //ファイルを１行ずつ取得する
        while ($line = fgets($fp)){
          $trim = rtrim($line);
          $wpcontentpass = mb_strstr($trim, ',', true);
          if($wpcontentpass == $ans){
            signupError();
            global $button;
            $button = 0;
            $i++;
          }
        }
        if($i == 0){
          $pass = $_POST['password'];
          $email = $_POST['address'];
          $from ="Goal-achievingsupportapp.com"; //差出人のメールアドレスをここに記入して使用
          $header = "From: $from\n";
          $header .= "Cc: $from\n";
          $sendmail_param = "-f$from";
          $subject = '新規アカウント登録完了';
          $body = "Goal-achieving support appの新規アカウントの登録が完了しました.\n";

          if( mb_send_mail($email, $subject, $body, $header, $sendmail_param) ){
            echo '登録を受け付けました。<br>'."\n";
            //echo '<form action="signup_complete.php" method="POST">'."\n";
            //echo '<br><input type="submit" value="次へ"></form>'."\n";
            global $button;
            $button = 1;
          }
          else{
            echo 'メールの送信に失敗しました。<br>'."\n";
          }

          $f = fopen("passmail.txt","a+" );
          fputs($f, $email);
          fputs($f, ",");
          fputs($f, $pass);
          fputs($f, "\n");
          fclose($f);
        }
        fclose($fp);
      }

      $return="";
      $next="";
      if ($button==1) $return="hide";
      if ($button==0) $next="hide";
      ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <input type="button" value="戻る" onClick="location.href='signup.php'" class="<?PHP echo $return; ?>">
      <form action="signup_complete.php" method="POST">
        <input type="submit" value="次へ" onClick="location.href='signup_complete.php'" class="<?PHP echo $next; ?>">
      </form>
    </div>
  </div>
</body>
</html>
