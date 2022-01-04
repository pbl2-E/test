<?php
 $file = file("Content.txt");
 $now = date("Y/m/d");
 foreach($file as $f){
 list($date, $content, $priority) = explode(',', rtrim($f));
 $db[$content.','.$priority] = $date;
 }
 array_multisort( array_map( "strtotime", $db ), SORT_ASC, $db );
 foreach($db as $key => $val) {
 if(strtotime($val) >= strtotime($now)){
 echo "$val,$key\n";
 }
 }
?>

