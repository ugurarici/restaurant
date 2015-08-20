<?php

function __autoload($className){
    require_once "classes/".$className.".php";
}

function view($viewName, $vars = NULL){
    if(!is_null($vars)) extract($vars, EXTR_OVERWRITE);
    require_once "views/__header.php";
    require_once "views/".$viewName.".php";
    require_once "views/__footer.php";
}

function dd($any){
    die(var_dump($any));
}