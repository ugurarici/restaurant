<?php

$usrObj = new User();

if($usrObj->isLoggedIn() != "")
{
    redirect('index.php');
}