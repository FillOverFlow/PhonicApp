<?php
    require '../class/user_class.php';
    $user_id = $_GET["user_id"];
    $user_fullname = $_POST["edit_fname"]; 
    $user_position = $_POST["edit_position"];
    $user_school = $_POST["edit_education"]; 
    $user_group = $_POST["edit_usergroup"];
    $user_email = $_POST["edit_email"];
    
    $user = new User();
    $user ->edit($user_id,$user_fullname,$user_position,$user_school,$user_group,$user_email);
    
?>