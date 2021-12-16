<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body{
 background-image:url("haikei.jpg");
  background-repeat:  no-repeat;                         /* 画像の繰り返しを指\\定*/
    background-position:center center;                     /* 画像の表示位置を\\指定*/
    background-size:contain;                               /* 画像のサイズを指\\定*/
    width:100%;                                            /* 横幅のサイズを指\\定*/
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
<form action="3_2.php" method="POST">
<input type="text" name="email" value="" placeholder="メールアドレス"><br>
<br>
<input type="password" name="password" value=""  placeholder="パスワード"><br>
<br>
<br>
<br>
<input type="submit" name="submit" value="ログイン">
<input type="button" value="新規登録" onClick="location.href='signup.php'">
</form>
</div>
</body>
</html>
