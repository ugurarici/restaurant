<?php
require_once "inc/global.php";
$menuCont = new Menu();
switch ($_REQUEST['task']) {
    case "catAdd":
        $menuCont->categoryAdd($_POST["catName"]);
        break;
    case "catDelete":
        $menuCont->categoryDelete($_GET["id"]);
        break;
    case "catEdit":
        $menuCont->editCategory($_POST["catId"], $_POST["catName"]);
        break;
}
redirect("categories.php");
