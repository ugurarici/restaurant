<?php
require_once "inc/global.php";

$menuCont = new Menu();

switch ($_REQUEST['task']) {
    case "catAdd":
    $menuCont->categoryAdd($_POST["catName"]);
    break;
    case "productAdd":
        $menuCont->productAdd($_POST["productName"], $_POST["productPrice"], $_POST["catId"]);
    break;
    case "catDelete":
    $menuCont->categoryDelete($_GET["id"]);
    break;
    case "productDelete":
    $menuCont->productDelete($_GET["id"]);
    break;
}

header("Location: products.php");