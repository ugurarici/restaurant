<?php
require_once "inc/global.php";

$menuCont = new Menu();

switch ($_REQUEST['task']) {
    case "productAdd":
        $menuCont->productAdd($_POST["productName"], $_POST["productPrice"], $_POST["catId"]);
        break;
    case "productDelete":
        $menuCont->productDelete($_GET["id"]);
        break;
    case "catEdit":
        $menuCont->editCategory($_POST["catId"], $_POST["catName"]);
        break;
    case "productEdit":
        $menuCont->editProduct($_POST["productId"], $_POST["catId"], $_POST["productName"], $_POST["productPrice"]);
        break;
}

redirect("product-list.php");
