<?php

function __autoload($className)
{
    require_once "model/" . $className . ".php";
}

function dd($var)
{
    echo "<pre>";
    die(var_dump($var) . "</pre>");
}