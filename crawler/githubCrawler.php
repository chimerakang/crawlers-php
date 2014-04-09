<?php
    require('issue.php');

    $issueMainPage = file_get_contents('https://github.com/kripken/emscripten/issues'); 
    echo getCloseIssue($issueMainPage) . "\n";
    echo getOpenIssue($issueMainPage) . "\n";
    echo getTotalIssue($issueMainPage) . "\n";
?>
