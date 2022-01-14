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

<div align="center">
<form name="form1"action="sendmail.php" method="post">
  <br>
  <br>
    <br>
  <br>
  <input type="textarea" name="address" placeholder="メールアドレス" size=24 required>
  <br>
  <br>
  <input type="password" name="password" placeholder="パスワード" size=25 required>
  <br>
  <br>
  <input type="button" value="戻る" onClick="history.back()">
    <input type="submit" value="登録" onClick="return RegisterCheck()">
</form>
</div>
</html>
