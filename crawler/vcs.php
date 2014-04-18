<?php
/**
*
* 此程式會clone github專案並且作分析
* 
* 輸出：
*   1.總commit次數
*   2.總行數
*   3.總檔案數
*   4.總檔案大小
*   5.總User數
*
* Author: York
* First Version:2014/04/12
*
*/

/*  變數宣告 */
function getVCS($name, $project){
$date = date('Ymd');
$fileName = 'snabbswitch_' .$date;

/* 執行clone */
// git config --global http.proxy http://77.88.208.58:8080
// git config --global --unset http.proxy
shell_exec("git clone http://github.com/$name/$project.git");
shell_exec("gitstats $project test1");
/* shell_exec('gitstats snabbswitch '.$fileName); */


chdir($project);
exec('git log --stat --summary  > ../output.txt');
chdir('..');

// /* 開始分析 */
exec('php vcs/crawlerAuthor.php',$outputAuthor);
exec('php vcs/crawlerCommit.php',$outputCommit);
exec('php vcs/crawlerContribute.php',$outputCountribute);
exec('php vcs/crawlerFilesAndLines.php',$outputFilesAndLines);




/* 資料輸出 */
foreach($outputAuthor as $output)
    echo $output."\r\n";
foreach($outputCommit as $output)
    echo $output."\r\n";
foreach($outputFilesAndLines as $output)
    echo $output."\r\n";
foreach($outputCountribute as $output)
    echo $output."\r\n";

exec("rm $project -rf");
exec("rm test1 -rf");
exec("rm output.txt");

}

?>
