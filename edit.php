<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <title>食品編集画面</title>
  <script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script>
</head>
<style>
  body {
    width: 60%;
    /*左も右も20%ずつ*/
    margin: 0 20%;
    /*今回はpaddingはゼロに*/
    padding: 0;
  }
</style>

<body>
  <center>
<h1> 食品編集画面 </h1>
    <!-- 変数名：商品名→product、賞味期限→limit、メモ→memo -->
    <!--echo"記入できました"を消してその下にホーム画面に戻るように変更してください -->
    <?php
    function EditPage()
    {
      echo  "<a href=HomePage.php></a>";
    }

    if ($_POST['send'] == ' 完了 ') {
      $product = $_POST['product'];
      $limit = $_POST['limit'];
      $memo = $_POST['memo'];

      if (empty($product) || empty($limit)) {
        echo '<font color="red">食品名・賞味期限が書かれていない、もしくは期限が間違っています。</font>'. "\n";
      }else{
        $fw = fopen("food.txt", "a"); // 追記する
        fwrite($fw, $product . "," . $limit . "," . $memo . "\n");
        fclose($fw);
        echo "記入できました" . "\n";

      }
    }
      echo '<form name="form1" action ="edit.php" method="POST">';
      echo '商品名<input type="text" name="product" size="20"><br>';
      echo '賞味期限<input type="text" name="limit" size="20"><br>';
      echo 'メモ<input type="text" name="memo" size="50"><br>';

      echo '<input type="reset" value=" 削除 ">';
      echo '<input type="submit" name="send" value=" 完了 "></form>';
    ?>
  </center>
<input type="button" name="戻る" value=" 戻る " onClick="location.href='HomePage.php'">
</body>
</html>
