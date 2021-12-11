<?php
$file = file("food.txt");
foreach($file as $f){
  list($product, $limit, $memo) = explode(',', rtrim($f));
  $db[$product.','.$limit] = $memo;
}
foreach($db as $key => $val) {
  echo "$key,$val\n";
}
?>
