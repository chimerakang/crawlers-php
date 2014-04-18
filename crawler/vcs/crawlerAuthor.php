<?php
/**
* 此程式用來分析github專案共有多少個author
* 
* 輸出：總User數
*  
* Author: York
* 2014/04/12
*/

$file = 'test1/authors.html';
$fileContent = file_get_contents($file);

$tmp = explode('</table>',$fileContent);
$tmp2 = explode('<td>',$tmp[0]);

echo "Total Authors:";
$num = 0 ;
for($i = 1; $i < count($tmp2); $i += 9)
{
    $num++;
}
	
echo " ".$num."\r\n";


?>