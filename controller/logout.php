<?php
$usrObj = new User();

if(isset($_GET['logOut']) && $_GET['logOut']=="true")
{
	$usrObj->logOut();
	$usrObj->redirect('index.php');
}
if(!isset($_SESSION['user_session']))
{
	$usrObj->redirect('index.php');
}