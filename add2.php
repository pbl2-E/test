<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<title></title>
</head>
<body>
<?php
 // テキストファイルのパーミッションを変更
 chmod("food.txt", "a") ;

 $name = $_POST['name'];
 $deadline = $_POST['deadline'];
 $memo = $_POST['memo'];

 // ファイルの書き込み
 $fw = fopen("food.txt", "a");
 fwrite($fw, $name.",".$deadline.",".$memo."\n");
 fclose($fw);
?>
<script>
 location.href="HomePage.php";
</script>
</body>
</html>
