<!DOCUMENT html>
<html lang="ja">
<head>
<title>食品内容追加ページ</title>
<meta charset="UTF-8">
<script type="text/javascript">
function HomePage(){
	location.href='HomePage.php';
}

function AddCheck(){
	name = document.getElementById("name").value;
	deadline = document.getElementById("deadline").value;

	if(name=="" || deadline==""){
		// 関数AddErrorの機能を併合
		document.getElementById("message").innerHTML = '<font color="red">食品名・賞味期限が書かれていない、もしくは期限が間違っています</font>'
		return false;
	}
	return true;
}

</script>
</head>
<body>
<br>
<br>
<br>
<br>
<span id="message"></span>
<br>
<form action="add2.php" method="POST">
<div align="center">
食品名　：<input type="text" id="name" size=15><br><br>
賞味期限：<input type="text" id="deadline" size=15><br><br>
　メモ　：<textarea id="memo" rows=4 cols=25></textarea><br><br>
<input type="button" value="　戻る　" onclick="HomePage()">　　<input type="submit" value="　追加　" onclick="return AddCheck()">
</div>
</form>
</body>
</html>
