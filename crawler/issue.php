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
            if($str[$i] >= '0' AND $str[$i] <= '9') {
                $value = $value*10 + ($str[$i] - '0');
            }
        }
        return $value;
    }

    function traverseIssues($baseUrl, $issueCount){
        $totalComments = 0;
        $authors = array();
        for($i = 1; $i <= $issueCount; ++$i) {
            $html = file_get_contents($baseUrl . "/" . $i);
            $totalComments += getCommentCountInSingleIssuePage($html);
            getAuthorCountInSingleIssuePage($html, $authors);
        }
        return $totalComments . "/" . sizeof($authors);
    }

    function getCommentCountInSingleIssuePage($html){
        return preg_match_all('/class="timeline-comment-header-text"/', $html, $unsue);
    }

    function getAuthorCountInSingleIssuePage($html, &$authorArr = null){
        if($authorArr == null)
            $authorArr = array();
        $localAuthorArr = array();

        $htmlArr = explode("\n", $html);
        $i = 0;
        foreach($htmlArr as $line) {
            if($line === '        <div class="timeline-comment-header-text">'){
                $author = trim(strip_tags($htmlArr[$i+2] . $htmlArr[$i+3]));
                $authorArr[$author] = 0;
                $localAuthorArr[$author] = 0;
            }
            ++$i;
        }
        return sizeof($localAuthorArr);
    }

    function getIssue($name, $project){
        $url = "https://github.com/$name/$project/issues";
        $issueMainPage = file_get_contents($url);
        $open = getOpenIssue($issueMainPage);
        $close = getCloseIssue($issueMainPage);
        $total = $open + $close;
        echo "Issue(open/close/total) : $open/$close/$total \n";
        echo "Total article/participants : " . traverseIssues($url, $total) . "\n";
    }
?>
