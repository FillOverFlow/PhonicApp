<?php
    require '../class/user_class.php';
    include '../../db_connection.php';
    $user_id = $_GET["user_id"];
    $user_pwd = $_POST["new_pass"];
    $old_pass = crypt($_POST["old_pass"], 'rl');
    
    // เช็ค รหัสผ่านเดิม 
    $sql = "SELECT user_name FROM user_account WHERE user_id='$user_id' AND user_pwd='$old_pass'";
	$sql = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($sql);
    
    $user = new User();
    if ($num == 0) {
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("รหัสผ่านเดิมไม่ถูกต้อง")) {'; //msg
        echo ' location.href="../Manageuser.php"';
        echo '}';
        echo '</script>';
        exit;
    }else {
        $user ->changePassword($user_id,$user_pwd,$old_pass);
    }
    
    
?>