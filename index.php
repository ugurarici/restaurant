<?php

// şen olasın Halep şehri

// masalar - class Table
// sipariş - class Order
// menü - class Menu


require_once "inc/global.php";

$tblObj = new Table();
$allTables = $tblObj->getAllTables();
view("tables", compact("allTables"));
?>





