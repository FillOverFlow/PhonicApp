<?php
    require '../class/user_class.php';

    $user_id = base64_decode(base64_decode($_GET['user_id']));

    $user = new User();
    $user ->delete($user_id);

?>