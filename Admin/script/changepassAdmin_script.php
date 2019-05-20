<?php
    require '../class/admin_class.php';
    $admin_id = $_GET["admin_id"];
    $admin_password = $_POST["new_pass"];
    $old_pass = $_POST["old_pass"];

    $user = new Admin();
    $user ->changePassword_admin($admin_id,$admin_password,$old_pass);
    
?>