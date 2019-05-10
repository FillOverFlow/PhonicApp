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
            ini_set('display_errors', 1);
            error_reporting(~0);

            include '../../db_connection.php';

            $sql = "INSERT INTO user_account (user_name,user_pwd,user_fullname,user_position,user_school,user_email) 
                VALUES ('$user_name','$user_pwd','$user_fullname','$user_position','$user_school','$user_email')";

            $query = mysqli_query($conn,$sql);

            if($query) {
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

            mysqli_close($conn);
        }
        function edit(){
            echo 'class edit user';
        }   
        function delete($user_id){
            
            ini_set('display_errors', 1);
            error_reporting(~0);

            include '../../db_connection.php';
            // $user_id = $_GET["user_id"];
            $sql = "DELETE FROM user_account WHERE user_id = '".$user_id."' ";

            $query = mysqli_query($conn,$sql);

            if (mysqli_query($conn, $sql)) {
                echo "Record deleted successfully";
             } else {
                echo "Error deleting record: " . mysqli_error($conn);
             }

            mysqli_close($conn);
        }

        /* authentication */
        function login($username,$password) //params username ,password
        {
            $this->username = $username;
            $this->password = $password;
            include '../../db_connection.php';
            echo 'username:'.$this->username;
            echo 'password:'.$this->password;
            // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
            if ($stmt = $conn->prepare('SELECT user_id, user_pwd FROM user_account WHERE user_name = ?')){
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $this->username);
            $stmt->execute();
            //store result
            $stmt->store_result();
            //if have user_name in database 
            if($stmt->num_rows > 0){
                $stmt->bind_result($user_id,$user_pwd);
                $stmt->fetch();
                //verify  password
                if(password_verify($this->password,$user_pwd)){
                //verify sucess !! User has loggin
                //create session
                    $_SESSION['loggedin'] = True;
                    $_SESSION['name'] = $this->username;
                    $_SESSION['id'] = $user_id;
                    return True;
                }else{echo "Incorrect Password!";return False;}
                }else{echo "Incorrect Username";}
                 $stmt->close();
                }
        }/*end function login*/
    /*end class user*/ 
    }


?>