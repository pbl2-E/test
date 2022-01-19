<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
  body{
    background-image:url("haikei.jpg");
    background-repeat:  no-repeat;                         /* 画像の繰り返しを指定*/
    background-position:center center;                     /* 画像の表示位置を指定*/
    background-size:contain;                               /* 画像のサイズを指定*/
    width:100%;                                            /* 横幅のサイズを指定*/
    height:400px;
  }
</style>
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
    <div style="padding: 50px; width:300px; border: 1px solid #00b4d8;">
      <h1 align="center">
        <font color="#0096c7">
          ログイン画面
        </font>
      </h1>
      <br>
      <br>
      <br>
      <form action="login_submit.php" method="POST">
        <font class="font2">ユーザー名</font><br>
        <input type="text" name="email" value=""placeholder="メールアドレス"><br>
        <br>
        <font class="font2">パスワード</font><br>
        <input type="password" name="password" value=""placeholder="パスワード"><br>
        <br>
        <br>
        <br>
        <input type="submit" name="submit" value="ログイン">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="新規登録" onClick="location.href='signup.php'">
      </form>
    </div>
  </div>
</body>
</html>
