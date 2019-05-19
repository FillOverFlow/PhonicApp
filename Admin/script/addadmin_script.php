<?php
    require '../class/admin_class.php';

    $admin_name = $_POST["username"];
    $admin_pwd = crypt($_POST["password"], 'rl');
    $admin_fullname = $_POST["fname"]; 
    $admin_email = $_POST["email"];

    $user = new Admin();
    $user ->add_admin($admin_name,$admin_pwd,$admin_fullname,$admin_email);
    
?>