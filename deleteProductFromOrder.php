<?php
require_once "inc/global.php";

$orderCont = new Order();
$orderCont->deleteProductFromOrder($_GET['orderProductId']);

header("Location: table.php?id=".$_GET['tableId'] );