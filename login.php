<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
  body {
    background-image: url(mizuirohaikeiy3.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
  .font1{
    font-size: 30px;
    font-weight: bold;
  }
  .font2{
    font-size: 15px;
    padding-right: 100px;
  }
 .explain2{
    float: right;
    padding-top:1px;
    padding-bottom:1px;
  }
  </style>
</head>

<body>
<div class="explain2">
<input type="button" value="アプリ操作説明へ" onClick="location.href='explain2.html'">
</div>
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
          ログイン画面
        </font>
      </h1>
      <br>
      <br>
      <br>
 <form action="login_submit.php" method="POST">
        <font class="font2">ユーザー名</font><br>
        <input type="text" name="email" value=""placeholder="メールアドレス" minlength="10" maxlength="50">
        <br>
        <font class="font2">パスワード</font><br>
        <input type="password" name="password" value=""placeholder="パスワード" minlength="4" maxlength="50">
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
