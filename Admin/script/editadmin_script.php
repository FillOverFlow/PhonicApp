<?php
    require '../class/admin_class.php';
    $admin_id = $_GET["admin_id"];
    $admin_fullname = $_POST["fname"]; 
    $admin_email = $_POST["email"];
    
    $user = new Admin();
    $user ->edit_admin($admin_id,$admin_fullname,$admin_email);
    
?>