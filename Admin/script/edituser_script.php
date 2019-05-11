<?php
    require '../class/user_class.php';
    $user_id = $_GET["user_id"];
    $user_name = $_POST["edit_username"];
    $user_pwd = $_POST["edit_password"];
    $user_fullname = $_POST["edit_fname"]; 
    $user_position = $_POST["edit_position"];
    $user_school = $_POST["edit_education"]; 
    $user_email = $_POST["edit_email"];
    
    $user = new User();
    $user ->edit($user_id,$user_name,$user_pwd,$user_fullname,$user_position,$user_school,$user_email);
    
?>