<?php


ini_set('display_errors', 1);

error_reporting(E_ALL);

function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
}

function debuged($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    exit;
}


function variableName(array $vars) {
    extract($vars);
    return $vars;
}