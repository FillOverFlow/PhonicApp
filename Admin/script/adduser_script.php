<?php
    require '../class/user_class.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new User();
    $user ->add($username,$password);
?>