<?php
require_once "inc/global.php";

$usrObj = new User();

/* switch ($_REQUEST['task']) {
    case "userAdd":
        $usrObj->userAdd($_POST["submit"]);
        break;
}*/
// $username,$password,$email,$fullname,$userPosition
if(isset($_POST['submit']) || isset($_GET['task']))
{
        switch ($_REQUEST['task']) {
            case "login":
                $username = fixTags(trim($_POST['username'])); //Hem email hem kullanıcı adı ile giriş için
                $password = fixTags(trim(md5(sha1($_POST['password']))));
                $email = fixTags(trim($_POST['username'])); //Hem email hem kullanıcı adı ile giriş için
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
                }else{
                    $usrObj->redirect('login.php?error=login');
                }

                break;
            case "register":
                //Formdan gelen değerler değişkenlere atandı
                $username = fixTags(trim($_POST['username'])); //Hem email hem kullanıcı adı ile giriş için
                $password = fixTags(trim(md5(sha1($_POST['password']))));
                $mail = fixTags(trim($_POST['email'])); //yeni kayıtta email
                $fullname = fixTags(trim($_POST['name']));
                $userPosition = fixTags(trim($_POST['userPosition']));

                if(!$username || !preg_match("/^\S+@\S+$/", $mail) || !$fullname || !$userPosition ) {
                    redirect('userList.php?msg=error');
                }else {
                    $reg = $usrObj->registerUser($username,$password,$mail,$fullname,$userPosition);
                    if($reg) {
                        redirect('userList.php?msg=success');
                    }else {
                        redirect('userList.php?msg=error');
                    }
                }
                break;

            case "userEdit":
                $username = fixTags(trim($_POST['username']));
                $mail = fixTags(trim($_POST['email']));
                $fullname = fixTags(trim($_POST['name']));
                $userPosition = fixTags(trim($_POST['userPosition']));
                $usrObj->userUpdate($_GET["userId"],$username,$mail,$fullname,$userPosition);
                redirect('userList.php');
                break;

            case "userDelete":
                $usrObj->userDelete($_GET["id"]);
                redirect('userList.php');
                break;

         }
} else {
    $usrObj->redirect('login.php');
}
