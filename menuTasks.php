<?php
require_once "inc/global.php";

$menuCont = new Menu();

switch ($_POST['task']) {
    case "catAdd":
    $menuCont->categoryAdd($_POST["catName"]);
    break;
    case "productAdd":
        $menuCont->productAdd($_POST["productName"], $_POST["productPrice"], $_POST["catId"]);
    break;
}

header("Location: products.php");