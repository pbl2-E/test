<?php 
 $file = file("Content.txt"); 
 foreach($file as $f){ 
 list($date, $content, $priority) = explode(',', rtrim($f)); 
 $db[$date.','.$content] = $priority; 
 } 
 arsort($db);
 // array_multisort( array_map( $db ), SORT_ASC, $db );
 foreach($db as $key => $val) { 
 echo "$key,$val\n"; 
 } 
?>
