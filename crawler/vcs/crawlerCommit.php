<?php
/**
*
* 此程式用來分析github專案commit次數
*
* 輸出：總commit次數
*
*
*/

$file = 'test1/activity.html';
$fileContent = file_get_contents($file);

$tmp = explode('<div class="vtable">',$fileContent); 
$tmp2 = explode('<td>',$tmp[4]);

echo "Total Commit (Commits by Year):";

$num = 0 ;

for($i = 1; $i < count($tmp2); $i += 4)
{
    // $year = substr($tmp2[$i],0,-5);
    $commitNum = explode('(',$tmp2[($i+1)]);
    
    // echo $year." commit ".$commitNum[0]."\r\n";
    
    
    $num += $commitNum[0];
}


echo " ".$num."\r\n";

?>