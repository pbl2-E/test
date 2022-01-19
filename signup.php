<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <script type="text/javascript">
  function RegisterCheck(){
    RegisterError();
  }
  function RegisterError(){
    if(document.form1.address.value=="" || document.form1.password.value==""){
      alert("メールアドレスもしくはパスワードが違います。");
      return false;
    }
  }
  </script>
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
    <form name="form1"action="sendmail.php" method="post">
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
        <font class="font2">ユーザー名</font><br>
        <input type="textarea" name="address" placeholder="メールアドレス" required>
        <br>
        <font class="font2">パスワード</font><br>
        <input type="password" name="password" placeholder="パスワード" required>
        <br>
        <br>
        <br>
        <input type="button" value="戻る" onClick="history.back()">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="登録" onClick="return RegisterCheck()">
      </div>
    </form>
  </div>
</body>
</html>
