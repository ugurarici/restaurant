<?php

include("ayar.php");
ob_start();
session_start();

$sifre = md5($_POST['sifre']);

$sql_check = mysql_query("select * from users where  password='".$sifre."' ") or die(mysql_error());

if(mysql_num_rows($sql_check))  {
    $_SESSION["login"] = "true";
    $_SESSION["pass"] = $sifre;

    header("Location:admin.php");
}
else {
    if($sifre=="") {
        echo "<center>Lutfen sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}

ob_end_flush();
?>
