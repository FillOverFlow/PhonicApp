<?php
class Admin
{
  function add_admin($admin_name, $admin_pwd, $admin_fullname, $admin_email)
  {
    $this->admin_username = $admin_name;
    $this->admin_password = $admin_pwd;
    $this->admin_fullname = $admin_fullname;
    $this->admin_email = $admin_email;
    include '../../db_connection.php';

    $stmt = $conn->prepare("INSERT INTO admin_account(admin_username,admin_password,admin_fullname,admin_email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param(
      'ssss',
      $this->admin_username,
      $this->admin_password,
      $this->admin_fullname,
      $this->admin_email
    );
    $stmt->execute();
    $newId = $stmt->insert_id;

    if ($stmt) {
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("บันทึกข้อมูลสำเร็จ")) {'; //msg
      echo ' location.href="../Manageadmin.php"';
      echo '}';
      echo '</script>';
      exit;
    } else {
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("บันทึกข้อมูลไม่สำเร็จ!!!! /n กรุณากรอกข้อมูลและบันทึกใหม่อีกครั้ง")) {'; //msg
      echo ' location.href="../addadmin.php"';
      echo '}';
      echo '</script>';
    }

    $stmt->close();
  }
  function edit_admin($admin_id, $admin_fullname, $admin_email)
  {
    $this->admin_id = $admin_id;
    $this->admin_fullname = $admin_fullname;
    $this->admin_email = $admin_email;

    include '../../db_connection.php';

    $stmt = $conn->prepare("UPDATE admin_account SET admin_fullname = ?,  
    admin_email = ?   
    WHERE admin_id = ?");
    $stmt->bind_param(
      'sss',
      $this->admin_fullname,
      $this->admin_email,
      $this->admin_id
    );

    $stmt->execute();

    if ($stmt) {
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("อัพเดทข้อมูลเรียบร้อย")) {'; //msg
      echo ' location.href="../Manageadmin.php"';
      echo '}';
      echo '</script>';
      exit;
    } else {
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("อัพเดทข้อมูลไม่สำเร็จ!!!! กรุณาลองใหม่อีกครั้ง")) {'; //msg
      echo ' location.href="../Manageadmin.php"';
      echo '}';
      echo '</script>';
    }

    $stmt->close();
  }
  function delete_admin($admin_id)
  {
    $this->admin_id = $admin_id;
    include '../../db_connection.php';

    $stmt = $conn->prepare("DELETE FROM admin_account WHERE admin_id = ?");
    $stmt->bind_param('i', $this->admin_id);
    $stmt->execute();

    if ($stmt) {
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("ลบข้อมูลสำเร็จ")) {'; //msg
      echo ' location.href="../Manageadmin.php"';
      echo '}';
      echo '</script>';
      exit;
    } else {
      echo '<script language="javascript" type="text/javascript"> ';
      echo 'if(!alert("ลบข้อมูลไม่สำเร็จ!!!!")) {'; //msg
      echo ' location.href="../Manageadmin.php"';
      echo '}';
      echo '</script>';
    }

    $stmt->close();
  }
  function changePassword_admin($admin_id,$admin_password,$old_pass)
  {
    $this->admin_id = $admin_id;
    $this->admin_password = crypt($admin_password, 'rl');
    $this->old_pass = crypt($old_pass, 'rl');
   
    include '../../db_connection.php';

    $stmt = $conn->prepare("UPDATE admin_account SET admin_password = ? 
    WHERE admin_id = ? and admin_password = '$old_pass'");
    $stmt->bind_param('ss',
    $this->admin_password,
    $this->admin_id);
    
    $stmt->execute(); 

    if($stmt) {
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("เปลี่ยนรหัสผ่านเรียบร้อย")) {';//msg
        echo ' location.href="../Manageadmin.php"';
        echo '}';
        echo '</script>';
        exit;  
    }else{
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("เปลี่ยนรหัสผ่านไม่สำเร็จ!!!! กรุณาลองใหม่อีกครั้ง")) {';//msg
        echo ' location.href="../Manageadmin.php"';
        echo '}';
        echo '</script>';
    }

    $stmt->close();
  }
  /* authentication */
  function login($username, $password) //params username ,password
  {
    $this->username = $username;
    $this->password = $password;
    include '../../db_connection.php';
    echo 'username:' . $this->username;
    echo 'password:' . $this->password;
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $conn->prepare('SELECT admin_id, admin_password FROM admin_account WHERE admin_username = ?')) {
      // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
      $stmt->bind_param('s', $this->username);
      $stmt->execute();
      //store result
      $stmt->store_result();
      //if have user_name in database 
      if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $admin_password);
        $stmt->fetch();
        //verify  password
        if (password_verify($this->password, $admin_password)) {
          //verify sucess !! User has loggin
          //create session
          $_SESSION['loggedin'] = True;
          $_SESSION['name'] = $this->username;
          $_SESSION['id'] = $admin_id;
          return True;
        } else {
          echo "Incorrect Password!";
          return False;
        }
      } else {
        echo "Incorrect Username";
      }
      $stmt->close();
    }
  } /*end function login*/
}
