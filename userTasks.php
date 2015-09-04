<?php
require_once "inc/global.php";

$usrObj = new User();

/* switch ($_REQUEST['task']) {
    case "userAdd":
        $usrObj->userAdd($_POST["submit"]);
        break;
}*/

if(isset($_POST['submit']))
{
    $username = fixTags(trim($_POST['username']));
    $password = fixTags(trim(md5(sha1($_POST['password']))));
    $email = $_POST['username'];
    if($usrObj->login($username,$password,$email))
    {
        if($usrObj->isLoggedIn() != "")
        {
            $userId = $_SESSION['user_session'];
            $userInfo = $usrObj->getOneUser($userId);
            if($userInfo["user_position"] == 1) {
                redirect('admin.php');
            }elseif ($userInfo["user_position"] == 2){
                redirect('products.php');
            }else {
                redirect('index.php');
            }
        }
    }
    else
    {
        $usrObj->redirect('login.php?error=login');
    }
} else {
    $usrObj->redirect('login.php');
}
