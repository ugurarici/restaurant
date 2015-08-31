<?php

include("ayar.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
    echo "<center>Admin sayfasina hosgeldiniz..! ";

    echo "<a href=logout.php>Guvenli cikis</a></center>";
}

require "inc/global.php";
require "controller/index.php";


require "view/_header.php";
require "view/tables.php";
require "view/_footer.php";

?>
