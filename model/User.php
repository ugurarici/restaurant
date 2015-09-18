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
    
    public function getAllUserCount(){
        $getAllUsersCount = $this->con->query('SELECT COUNT(id) FROM users')->fetch(PDO::FETCH_ASSOC);
        return $getAllUsersCount;
   }

    public function registerUser($username,$password,$email,$fullname,$userPosition){
        //Veritabanında aynı username veya email varsa false döndürecek
        $isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1");
        $isThereUser->execute(array(':username'=>$username, ':email'=>$email));
        if($isThereUser->rowCount() > 0) {
           // return false;
           return redirect('userList.php?msg=errorExist'); //Hatalı kullanım düzeltilecek
        }else {
        $UserRegister = $this->con->prepare("INSERT INTO users(username,password,email,fullname,user_position) VALUES(:username, :password, :email, :fullname, :userPosition )");
        //PDOStatement->bindParam — Bir değiştirgeyi belirtilen "değişken"le ilişkilendirir
        $UserRegister->bindParam(":username", $username);
        $UserRegister->bindParam(":password", $password);
        $UserRegister->bindParam(":email", $email);
        $UserRegister->bindParam(":fullname", $fullname);
        $UserRegister->bindParam(":userPosition", $userPosition);
        $UserRegister->execute();
        }

        return $UserRegister;

    }

    public function userUpdate($userId,$username,$email,$fullname,$userPosition){
        $edit = $this->con->prepare("UPDATE users SET username=?, email=?, fullname=?, user_position=? WHERE id=$userId");
        $cntrl = $edit->execute(array($username, $email, $fullname,$userPosition));

        if($cntrl)
            return true;
        return false;

    }

    public function userDelete($userId)
    {
        $del = $this->con->exec("DELETE FROM users WHERE id=" . $userId);

        if ($del)
            return true;
        return false;
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

}
