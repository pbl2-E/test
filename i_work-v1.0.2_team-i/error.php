<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php

function is_error($a, $b, $c){
    if( !(empty($a)) && !(empty($b)) && !(empty($c)) ){//2021/7/29修正(金子)
        $fw = fopen("Content.txt", "a"); // 追記する
      fwrite( $fw, $c.",".$a.",".$b."\n");
      fclose($fw);
      echo "予定が追加されました<br>";  //2021/7/8 修正(金子)
      echo '<a href="javascript:history.back();">前のページに戻る</a>';
    }
    else {
      echo "予定を追加できません<br>";  //2021/7/8 修正(金子)
      echo "入力されてない項目があります<br>";  //2021/7/8 修正(金子)
      echo '<a href="javascript:history.back();">前のページに戻る</a>';
    }
}

if(isset($_POST['content'])){  //2021/7/9 修正(金子)
  is_error($_POST['content'], $_POST['priority'], $_POST['date']); //2021/7/9　修正(金子)
}
else {
  is_error($_POST['plan'], $_POST['priority'], $_POST['date']);
}
//else{is_error(,,)}削除,2021/7/8
//※特記事項…エラーが適切に分類できていません。2021/7/8(金子)
//2021/7/9 is_error関数書き換えました(金子)
?>
</body>
</html>
