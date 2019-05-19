<?php
    session_start();
    require '../class/admin_class.php';
    $admin_id = $_GET['admin_id'];
    
    $user = new Admin();
    if ($_SESSION["id"] != $admin_id) {
      $user ->delete_admin($admin_id);
    }else{
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("ไม่สามารถลบได้ เนื่องจากใช้งานอยู่ !!!")) {'; //msg
      echo ' location.href="../Manageadmin.php"';
      echo '}';
      echo '</script>';
    }
    

?>