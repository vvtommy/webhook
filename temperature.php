<?php
error_reporting(0);
exec('sensors',$str);
preg_match('/:\s+(.+)\s+\(/',$str[7],$matchs);
$core1=split(' ', trim($matchs[1]));
$core1=(float)$core1[0];
preg_match('/:\s+(.+)\s+\(/',$str[8],$matchs);
$core2=split(' ', trim($matchs[1]));
$core2=(float)$core2[0];



echo "<pre>\ncore1:$core1\ncore2:$core2\n</pre>"


?>