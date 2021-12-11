<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body{
 background-image:url("haikei.jpg");
  background-repeat:  no-repeat;                         /* 画像の繰り返しを指定  */              
    background-position:center center;                     /* 画像の表示位置を指定  */
    background-size:contain;                               /* 画像のサイズを指定    */
    width:100%;                                            /* 横幅のサイズを指定    */
    height:400px;
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
<br>
<form action="login_submit.php" method="POST">
<input type="text" name="email" value="" placeholder="メールアドレス"><br>
<br>
<input type="password" name="password" value=""  placeholder="パスワード"><br>
<br>
<br>
<br>
<input type="submit" name="submit" value="ログイン">
<input type="button" value="戻る" onClick="location.href='LoginPage.html'">
</form>
</div>
</body>
</html>

