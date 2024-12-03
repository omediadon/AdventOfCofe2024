<?php
/*
* Created by Pocket PHP on Samsung S21
* You can change PHP settings
* in etc/php.ini
*/

function operateOnValidOperations($input){
 preg_match_all('/mul\((?\'left\'\d{1,3}),(?\'right\'\d{1,3})\)/', $input, $output);
 $total = 0;
 foreach($output['left'] as $i => $val){
   $total += intval($val) * intval($output['right'][$i]);
 } 
return $total;  
}

$inputLines = file_get_contents('day3.txt');

$result = operateOnValidOperations($inputLines);

var_dump($result);
