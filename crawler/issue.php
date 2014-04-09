<?php
    function getTotalIssue($html){
        return getOpenIssue($html) + getCloseIssue($html);
    }

    function getOpenIssue($html){
        preg_match('/([0-9],?)+ Open/', $html, $matches);
        $arr = explode(' ', $matches[0]);
        return intStrToInt($arr[0]);
    }

    function getCloseIssue($html){
        preg_match('/([0-9],?)+ Closed/', $html, $matches);
        $arr = explode(' ', $matches[0]);
        return intStrToInt($arr[0]);
    }

    function intStrToInt($str){
        $value = 0;
        for($i = 0; $i < strlen($str); ++$i) {
            if($str[$i] >= '0' && $str[$i] <= '9') {
                $value = $value*10 + ($str[$i] - '0');
            }
        }
        return $value;
    }
?>
