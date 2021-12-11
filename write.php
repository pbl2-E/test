<?php
  if (!empty($_FILES['upfile']['name']) ){
  $upfile = $_FILES['upfile']['tmp_name'];
  $upfile_name = $_FILES['upfile']['name'];
  echo "$upfile_name\n";
  move_uploaded_file($upfile,"upload/$upfile_name");
}
  session_start();
  if(isset($_GET["id"])){
    $_SESSION["id"] = $_GET["id"];
  }
  $id = $_POST['thread_id'];
  $body = $_POST['body'];
  $user_id = $_SESSION["id"];
  echo "$user_id";
  $f = fopen("./thread".$id.".txt", "a");
  fwrite($f, "$body\n");
  fwrite($f, "<IMG>\n");
  fwrite($f, "$upfile_name\n");
  fwrite($f, "<END>\n");
  fclose($f);
  echo '投稿が完了しました。'.'<br>';
  echo '<a href="thread.php?'.$id.'">スレッドに戻る</a>';
?>