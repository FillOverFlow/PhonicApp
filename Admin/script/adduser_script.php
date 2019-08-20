<?php
    require '../class/user_class.php';

    $user_name = $_POST["username"];
    $user_pwd = crypt($_POST["password"], 'rl');
    $user_fullname = $_POST["fname"]; 
    $user_position = $_POST["Position"];
    $user_school = $_POST["education"]; 
    $user_group = $_POST["usergroup"];
    $user_email = $_POST["email"];

    $user = new User();
    $user ->add($user_name,$user_pwd,$user_fullname,$user_position,$user_school,$user_group,$user_email);
    
?>