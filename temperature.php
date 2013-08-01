<?php
exec('sensors',$str);
var_dump($str);
preg_match('/:\s+(.+)\s+\(/',$str[7],$matchs);
$core1=preg_split(' ', trim($matchs[1]));
$core1=(int)$core1[0];
preg_match('/:\s+(.+)\s+\(/',$str[8],$matchs);
$core2=preg_split(' ', trim($matchs[1]));
$core2=(int)$core2[0];



echo "<pre>\ncore1:$core1\ncore2:$core2\n</pre>"


?>