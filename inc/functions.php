<?php

function __autoload($className){
    require_once "classes/".$className.".php";
}

function dd($var){
    die(var_dump($var));
}