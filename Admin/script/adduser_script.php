<?php
    require '../class/user_class.php';

    $user_name = $_POST["username"];
    $user_pwd = crypt($_POST["password"], 'rl');
    $user_conpwd = crypt($_POST["con_password"], 'rl');
    $user_fullname = $_POST["fname"]; 
    $user_position = $_POST["Position"];
    $user_school = $_POST["education"]; 
    $user_email = $_POST["email"];

    // ยืนยันรหัสผ่าน
    if ($user_conpwd != $user_pwd) {
        echo "<script>alert('รหัสผ่านไม่ตรงกัน!!'); window.location='../adduser.php';</script>";
        exit();
    }
    
    $user = new User();
    $user ->add($user_name,$user_pwd,$user_fullname,$user_position,$user_school,$user_email);
    
?>