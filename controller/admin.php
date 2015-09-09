<?php
$usrObj = new User();
$userCount = $usrObj->getAllUserCount();
$order = new Order();
$orderCount = $order->getAllOrdersCount();
$menuObj = new Menu();
$productCount = $menuObj->getAllProductCount();
$categoryCount = $menuObj->getAllCategoriesCount();
if ($usrObj->isLoggedIn() == "" ) {
    $usrObj->redirect('login.php');
}else {
    $users = $usrObj->getAllUsers();
    $userId = $_SESSION['user_session'];
    $userInfo = $usrObj->getOneUser($userId);
    if ($userInfo["user_position"] != 1){
        $usrObj->redirect('login.php');
    }
}
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
    if ($_GET["task"] == "productEdit") {
        $getProduct = $menuObj->getProduct($_GET["productId"]);
        $productTask = "productEdit";
        $productPostIdInput = '<input type="hidden" name="productId" value="' . $getProduct["id"] . '" />';
        $productName = "value='$getProduct[name]'";
        $productPrice = "value='$getProduct[price]'";
        $productCatId = $getProduct["category_id"];
    }
}
