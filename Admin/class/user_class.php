<?php
    //Code by Phonratichai
    //class สำหรับ ใช้ insert update delete user 
    //วิธีใช้งาน
    /*
        #.... Example ....#
        require 'class/user_class.php'
        $user = new User();
        $user -> add(ตัวแปรต่างๆ);
    
    */

    
    class User{
        /*add edit delete user*/
        function add($user_name,$user_pwd,$user_fullname,$user_position,$user_school,$user_email)
        {
            $this->user_name = $user_name;
            $this->user_pwd = $user_pwd;
            $this->user_fullname = $user_fullname;
            $this->user_position = $user_position;
            $this->user_school = $user_school;
            $this->user_email = $user_email;
            include '../../db_connection.php';

            $stmt = $conn->prepare("INSERT INTO user_account(user_name,user_pwd,user_fullname,user_position,user_school,user_email) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $this->user_name, 
            $this->user_pwd,
            $this->user_fullname,
            $this->user_position,
            $this->user_school,
            $this->user_email);
            $stmt->execute();
            $newId = $stmt->insert_id;

            if($stmt) {
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("บันทึกข้อมูลสำเร็จ")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
                exit;  
            }else{
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("บันทึกข้อมูลไม่สำเร็จ!!!! /n กรุณากรอกข้อมูลและบันทึกใหม่อีกครั้ง")) {';//msg
                echo ' location.href="../adduser.php"';
                echo '}';
                echo '</script>';
            }

            $stmt->close();
            
        }
        function edit($user_id,$user_fullname,$user_position,$user_school,$user_email){

            $this->user_id = $user_id;
            $this->user_fullname = $user_fullname;
            $this->user_position = $user_position;
            $this->user_school = $user_school;
            $this->user_email = $user_email;
            include '../../db_connection.php';

            $stmt = $conn->prepare("UPDATE user_account SET user_fullname = ?,  
            user_position = ?,  
            user_school = ?,
            user_email = ?   
            WHERE user_id = ?");
            $stmt->bind_param('sssss',
            $_POST['edit_fname'],
            $_POST['edit_position'], 
            $_POST['edit_education'],
            $_POST['edit_email'],
            $this->user_id);
            
            $stmt->execute(); 

            if($stmt) {
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("อัพเดทข้อมูลเรียบร้อย")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
                exit;  
            }else{
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("อัพเดทข้อมูลไม่สำเร็จ!!!! กรุณาลองใหม่อีกครั้ง")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
            }

            $stmt->close();

        }   
        function delete($user_id){
            
            $this->user_id = $user_id;
            include '../../db_connection.php';
            
            $stmt = $conn->prepare("DELETE FROM user_account WHERE user_id = ?");
            $stmt->bind_param('i', $this->user_id);
            $stmt->execute(); 
            
            if($stmt) {
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("ลบข้อมูลสำเร็จ")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
                exit;  
            }else{
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("ลบข้อมูลไม่สำเร็จ!!!!")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
            }

            $stmt->close();
        }
        function changePassword($user_id,$user_pwd,$old_pass){
            $this->user_id = $user_id;
            $this->user_pwd = crypt($user_pwd, 'rl');
            $this->old_pass = crypt($old_pass, 'rl');
           
            include '../../db_connection.php';

            $stmt = $conn->prepare("UPDATE user_account SET user_pwd = ? 
            WHERE user_id = ?");
            $stmt->bind_param('ss',
            $this->user_pwd,
            $this->user_id);
            
            $stmt->execute(); 

            if($stmt) {
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("เปลี่ยนรหัสผ่านเรียบร้อย")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
                exit;  
            }else{
                echo '<script language="javascript" type="text/javascript"> ';
                echo 'if(!alert("เปลี่ยนรหัสผ่านไม่สำเร็จ!!!! กรุณาลองใหม่อีกครั้ง")) {';//msg
                echo ' location.href="../Manageuser.php"';
                echo '}';
                echo '</script>';
            }

            $stmt->close();
        }
    /*end class user*/ 
    }
