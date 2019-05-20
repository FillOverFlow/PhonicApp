<?php
    require '../class/user_class.php';
    $user_id = $_GET["user_id"];
    $user_pwd = $_POST["new_pass"];
    $old_pass = $_POST["old_pass"];

    $user = new User();
    $user ->changePassword($user_id,$user_pwd,$old_pass);
    
?>