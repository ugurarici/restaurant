<?php
require_once "inc/global.php";

$orderCont = new Order();
$orderCont->addProductToTableOrder($_GET['productId'], $_GET['tableId']);

header("Location: table.php?id=".$_GET['tableId'] );