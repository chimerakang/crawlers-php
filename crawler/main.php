<?php
    require('issue.php');
    require('ranking.php');
    require('wiki.php');
    require('vcs.php');

    $display_errors = 0;
    if($argc > 4 || $argc < 3) {
        echo "usage php main.php <project owner> <project name> [options]\n";
        exit(0);
    }

    $owner = $argv[1];
    $project = $argv[2];
    $option = ($argc == 4)? strtoupper($argv[3]) : "RWIV";
    
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
