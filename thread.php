<!DOCTYPE HTML>
<html>
<head>
<title>スレッド</title>
<style>
label > input {
display:none; /* アップロードボタンのスタイルを無効にする */
}
label {
color: #fff; /* ラベルテキストの色を指定する */
background-color: #8cf;/* ラベルの背景色を指定する */
border:solid 1px #6af;
}

.box1{
display:inline-block;

  margin:1em 0;
    background-color:#e0ffff;
       border:solid 1px #6af;
}
#c-box{
width:19%;
float:right
}
#b-box{
width:80%;
float:left
}
 .button{
      color:#fff;
      background-color:#8cf;
      border:solid 1px #6af;
    }
</style>
</head>
<body>
<div style="text-align:center;">
<a href="./home.php">戻る</a>
<?php
 $file = file_get_contents("thread".$_SERVER['QUERY_STRING'].".txt");
 $item1 = explode("\n<TITLE>\n", $file);
 list($time1, $num1, $tag1, $ID1, $title1) = explode(',', $item1[0]);
?>
<p class="box1 d-box">スレッド名:
<?php 
  echo $title1; 
?>
</p>
タグ:
<?php
 echo $tag1; 
?>
</div>
<div name="contents">
<br><br>
<br><br>
<br><br>
</div>
<form enctype="multipart/form-data" action="./write.php" method="POST">
<div>
<div style="border:1px solid #000;width:80%" id="b-box">
<textarea style="resize:vertical;width:98%;border-left:none;border-right:none;border-top:none;height:100px" name="body">
</textarea>
<br>
<label for="file_upload">
ファイルを選択
<input type="file" name="upfile" id="file_upload" class="button" size=100></label><br>
</div>
<div id="c-box">
<br>
<input type="hidden" name="thread_id" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
<input type="submit" style="width:100px" class="button" value="投稿">
</form>
</div>
</div>
<br><br><br><br><br><br><br><br>
<?php
 $str = file_get_contents("thread".$_SERVER['QUERY_STRING'].".txt");
 list($title, $body) = explode("\n<TITLE>\n", $str);
 $item = explode("\n<END>\n", $body);
 for($i=0; $i < count($item)-1; $i++){
   list($text, $imgfile) = explode("\n<IMG>\n", $item[$i]);
   echo ($i+1)."$item[$i]";
   $filepath = pathinfo("$imgfile");
      if( $filepath['extension'] == 'jpg' || $filepath['extension'] == 'png' ){
          echo '<img src="./upload/'.$imgfile.'" class="expansion" width="200"><br>'."\n";
      }else{
          echo '<a href="'.$imgfile.'">'.$imgfile.'</a><br>'."\n";
      }
 }

?>
</body>
</html>
