<?php

function __autoload($className){
    require_once "classes/".$className.".php";
}