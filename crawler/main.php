<?php
    require('issue.php');
    require('ranking.php');
    require('wiki.php');
/*
    $issueMainPage = file_get_contents('https://github.com/kripken/emscripten/issues'); 
    echo getCloseIssue($issueMainPage) . "\n";
    echo getOpenIssue($issueMainPage) . "\n";
    echo getTotalIssue($issueMainPage) . "\n";

    $authors = array();
    $issue2265Page = file_get_contents('https://github.com/kripken/emscripten/issues/2265');
    echo getCommentCountInSingleIssuePage($issue2265Page) . "\n";
    echo getAuthorCountInSingleIssuePage($issue2265Page, $authors) . "\n";

    $issue2274Page = file_get_contents('https://github.com/kripken/emscripten/issues/2274');
    echo getCommentCountInSingleIssuePage($issue2274Page) . "\n";
    echo getAuthorCountInSingleIssuePage($issue2274Page, $authors) . "\n";

    echo sizeof($authors) . "\n";
*/
//    traverseIssues('https://github.com/kripken/emscripten/issues', 5);

//    getRanking('kripken', 'emscripten');
    getWiki('kripken', 'emscripten');
?>
