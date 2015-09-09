<?php
require_once "inc/global.php";

$orderCont = new Order();
$usrObj = new User();
//İşlemi en son kimin yaptığını kayıt etmek için session ile id alıyoruz
$userId = $_SESSION['user_session'];
$userInfo = $usrObj->getOneUser($userId);

switch($_GET['task']){
    case "add":
        // masa siparişine ürün ekleme
        $orderCont->addProductToTableOrder($_GET['productId'], $_GET['tableId']);
        break;
    case "delete":
        // siparişten ürün silme
        $orderCont->deleteProductFromOrder($_GET['orderProductId']);
        break;
    case "cancel":
        $orderCont->cancelTableOrder($_GET["tableId"]);
        break;
    case "move":
        $orderCont->moveTableOrder($_GET['fromTableId'], $_GET['tableId']);
        break;
    case "finish":
        $orderCont->closeTableOrder($_GET['tableId'], $userInfo["id"]);
        break;
}

header("Location: table.php?id=".$_GET['tableId'] );