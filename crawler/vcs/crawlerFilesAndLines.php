<?php
/**
*
* 此程式用來分析github專案
*   1.總檔案數
*   2.總行數
*   3.總檔案大小
*
* 輸出：
*   1.總檔案數
*   2.總行數
*   3.總檔案大小
*
*
*/

$file = 'test1/files.html';
$fileContent = file_get_contents($file);

$tmp = explode('</dd>',$fileContent);
$tmpFiles= explode('<dd>',$tmp[0]);
$tmpLines= explode('<dd>',$tmp[1]);
$tmpFileSize= explode('<dd>',$tmp[2]);


/* 將檔案大小轉成MB */
$totalFileSize = number_format( ($tmpFileSize[1] / 1000 ) , 4 ) * $tmpFiles[1] ;
$totalFileSize = number_format( $totalFileSize, 2 )  ;

echo "Total Files: ".$tmpFiles[1]."\r\nTotal Lines: ".$tmpLines[1]."\r\nTotal File Size: ".$totalFileSize."MB\r\n";


?>