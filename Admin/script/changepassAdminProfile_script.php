<?php
session_start();
    require '../class/admin_class.php';
    include '../../db_connection.php';
    $admin_id = $_SESSION["id"];
    $admin_password = $_POST["new_pass"];
    $old_pass = crypt($_POST["old_pass"], 'rl');

    // เช็ค รหัสผ่านเดิม
  $sql = "SELECT admin_username FROM admin_account WHERE admin_id='$admin_id' AND admin_password='$old_pass'";
	$sql = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($sql);

    $user = new Admin();

    if ($num == 0) {
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("รหัสผ่านเดิมไม่ถูกต้อง")) {'; //msg
        echo ' location.href="../Manageadmin.php"';
        echo '}';
        echo '</script>';
        exit;
    }else{
        $user ->changePassword_admin($admin_id,$admin_password,$old_pass);
    }
