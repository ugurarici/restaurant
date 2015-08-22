<?php
$menuObj = new Menu();
$menu = $menuObj->getFullMenu();
$categories = $menuObj->getAllCategories();

$catValue = "";
$catTask = "catAdd";
$catPostIdInput = "";

$productTask = "productAdd";
$productPostIdInput = "";
$productName = "";
$productPrice = "";
$productCatId = 0;

if (isset($_GET["task"])) {

    if ($_GET["task"] == "catEdit") {
        $getCat = $menuObj->getCategory($_GET["catId"]);
        $catValue = "value='$getCat[name]'";
        $catTask = "catEdit";
        $catPostIdInput = '<input type="hidden" name="catId" value="' . $getCat["id"] . '" />';
    }

    if ($_GET["task"] == "productEdit") {
        $getProduct = $menuObj->getProduct($_GET["productId"]);
        $productTask = "productEdit";
        $productPostIdInput = '<input type="hidden" name="productId" value="' . $getProduct["id"] . '" />';
        $productName = "value='$getProduct[name]'";
        $productPrice = "value='$getProduct[price]'";
        $productCatId = $getProduct["category_id"];
    }
}

?>