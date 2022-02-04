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
          ログイン画面
        </font>
      </h1>
      <br>
      <br>
      <br>
      <?php

      function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

      function LoginError(){
        echo "メールアドレスもしくは<br>パスワードが違います<br>";
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
      <br>
      <br>
      <br>
      <br>
      <input type="button" value="戻る" onClick="location.href='login.php'">
    </div>
  </div>
</body>
</html>
