<?php
include_once("Database.php");

class Login extends Database{
    public function authLogin($data)
    {
        $username = $data["username"];
        $password = $data["password"];

        $sql1 = "SELECT * FROM user WHERE username = '$username'";
        $cek_user = $this->db->query($sql1)->fetch_assoc();

        if (!empty($cek_user)) {
            if ($password == $cek_user['password']) {

                $_SESSION['id'] = $cek_user["id"];

                if ($cek_user['role'] == 'admin') {
                    header("Location: admin/index.php  ");
                } elseif ($cek_user['role'] == 'user') {
                    header("Location: user/index.php");
                }
            }
        } else {
            echo "GAGAL LOGIN";
        }
    }



public function register($fullname,$username,$password,$password2,$role,$verif){
  $role = "user";
  $verif = "unverified";

  
    $sql = mysqli_query($this->db, "INSERT INTO user(fullname,username,password,password2,role,verif)VALUES ('$fullname','$username','$password','$password2','$role','$verif')");

    return $sql;
   
    if ($cek_user['role'] == 'admin') {
        header("Location: admin/index.php  ");
    } elseif ($cek_user['role'] == 'user') {
        header("Location: user/index.php");
    }
}
}