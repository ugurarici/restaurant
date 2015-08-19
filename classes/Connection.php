<?php

class Connection{
    protected $con;
    private $host = "localhost";
    private $dbname = "restaurant";
    private $user = "root";
    private $password = "";

    function __construct(){
        $this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=UTF8;", $this->user, $this->password);
    }
}