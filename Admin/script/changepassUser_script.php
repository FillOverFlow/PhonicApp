<?php
    require '../class/user_class.php';
    $user_id = $_GET["user_id"];
    $user_pwd = crypt($_POST["new_pass"], 'rl');
    $old_pass = crypt($_POST["old_pass"], 'rl');

    $user = new User();
    $user ->changePassword($user_id,$user_pwd,$old_pass);
    
?>