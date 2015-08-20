<?php

class Connection
{
    protected $con;

    function __construct(){
        $this->con = new PDO("mysql:host=localhost;dbname=restaurant;charset=UTF8;", "root", "");
    }
}