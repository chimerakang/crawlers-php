<?php
    require('issue.php');
    require('ranking.php');
    require('wiki.php');
    require('vcs.php');

    $display_errors = 0;
    if($argc > 3 || $argc < 2) {
        echo "usage php main.php <project url> [options]\n";
        exit(0);
    }

    $urlArray = explode("/" ,$argv[1]);
    $owner = $urlArray[3];
    $project = $urlArray[4];
    $option = ($argc == 3)? strtoupper($argv[3]) : "RWIV";
    
    if(strpos($option, 'R') !== false){
        echo "Getting Rankings...\n";
        getRanking($owner, $project);
        echo "========================\n";
    }
    if(strpos($option, 'W') !== false){
        echo "Getting Wikis...\n";
        getWiki($owner, $project);
        echo "========================\n";
    }
    if(strpos($option, 'I') !== false){
        echo "Getting issues...\n";
        getIssue($owner, $project);
        echo "========================\n";
    }
    if(strpos($option, 'V') !== false){
        echo "Getting vcs...\n";
        getVCS($owner, $project);
        echo "========================\n";
    }
?>
