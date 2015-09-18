<?php
class User extends Connection
{
    public function getAllUsers(){
        $users = $this->con->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getOneUser($userId){
        $user = $this->con->query("SELECT * FROM users WHERE id = ". $userId)->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function registerUser($username,$password,$email,$fullname,$userPosition){

        $newPassword = sha1($password);
        $isThereUser = $this->con->prepare("INSERT INTO users(username,email,password,fullname,user_position) VALUES(:username, :password, :email, :fullname, :userPosition )");
        //PDOStatement->bindParam — Bir değiştirgeyi belirtilen "değişken"le ilişkilendirir
        $isThereUser->bindParam(":username", $username);
        $isThereUser->bindParam(":password", $newPassword);
        $isThereUser->bindParam(":email", $email);
        $isThereUser->bindParam(":fullname", $fullname);
        $isThereUser->bindParam(":userPosition", $userPosition);
        $isThereUser->execute();

        return $isThereUser;

    }

   // public function login($username,$password){ // Sadece kullanıcı adı ve şifre kontrol etmek istenirse
    public function login($username,$password,$email){
       $isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1");
        //$isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username LIMIT 1"); // Bu kısım sadece kullanıcı adı kullanılacaksa
        $isThereUser->execute(array(':username'=>$username, ':email'=>$email));
       // $isThereUser->execute(array(':username'=>$username)); // sadece kullanıcı adı kullanılacaksa
        $userRow=$isThereUser->fetch(PDO::FETCH_ASSOC);
        if($isThereUser->rowCount() > 0)
        {
            //if(password_verify($password, $userRow['password'])) // php 5.5 üzeri desteklemektedir.
          if($password == $userRow['password'])
            {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
            }
            else
            {
                return false;
            }
        }
        

    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }

    public function logOut()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
    public function getAllUserCount(){
        $getAllUsersCount = $this->con->query('SELECT COUNT(id) FROM users')->fetch(PDO::FETCH_ASSOC);
        return $getAllUsersCount;
    }

}
