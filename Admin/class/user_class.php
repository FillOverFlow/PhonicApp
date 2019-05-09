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
        function add($username,$password){

        }
        function edit(){
            echo 'class edit user';
        }   
        function delete(){
            echo 'delete user';
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