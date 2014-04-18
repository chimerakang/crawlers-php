<?php
define("CREATE", "create");
define("DELETE", "delete");
define("MODIFY", "modify");

$file = 'output.txt';
$fileContent = file_get_contents($file);
$numOfActions = 0;
$numOfFileChg = 0;


$tmp = explode('Author: ',$fileContent);


for($i = 1; $i < count($tmp); $i++)
{
    $index = $i - 1;
    
    // Get Author
    $tmpAuthors = explode('<',$tmp[$i]);
    $authors[$index] = $tmpAuthors[0];
    
    // Get the number of file change
    $tmpFileChg = explode(' changed',$tmp[$i]);
    $tmpFileChg2 = explode(' file',$tmpFileChg[0]);
    
    $j = 0;
    
   
    $str = substr($tmpFileChg2[$j],-1,1);
    $isInt = isInt($str);
    
    while(!$isInt)
    {
        $j++;
        
        $str = substr($tmpFileChg2[$j],-1,1);
        
        if($str == '') 
        {
            $str = 0;
            break;
        }
        else
            $isInt = isInt($str);
                
    }
    
    $aryNumOfFileChg[$index] = $str;
    
    /* Get file change actions */
    $tmp4 = explode(' mode',$tmp[$i]);
    $aryActions[$index]['create'] = 0;
    $aryActions[$index]['delete'] = 0;
    $aryActions[$index]['modify'] = 0;
    
    for($k = 0; $k <= count($tmp4) - 1; $k++)
    {
        $action = substr($tmp4[$k],-6,6);
        
        if($aryNumOfFileChg[$index] !== 0)
        {
            if( $action !== CREATE AND $action !== DELETE)
                $action = 'modify';
            $aryActions[$index][$action]++;
        }
    }
}

echo "Authors\tChanged files\tC/M/D\n";
for($i = 0; $i < count($authors); ++$i) {
    echo $authors[$i] . "\t" . $aryNumOfFileChg[$i] . "\t";
    echo $aryActions[$i]['create'] . "/" . $aryActions[$i]['modify'] . "/" . $aryActions[$i]['delete']. "\n";
}

function isInt($str)
{
    $ascii = ord($str);
    
    if( $ascii > 57 OR $ascii < 48) 
        return false;
    else
        return true;
}
?>
