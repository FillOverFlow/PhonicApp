<?php
  class Admin{
    function add_admin(){
      
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
        if ($stmt = $conn->prepare('SELECT admin_id, admin_password FROM admin_account WHERE admin_username = ?')){
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $this->username);
        $stmt->execute();
        //store result
        $stmt->store_result();
        //if have user_name in database 
        if($stmt->num_rows > 0){
            $stmt->bind_result($admin_id,$admin_password);
            $stmt->fetch();
            //verify  password
            if(password_verify($this->password,$admin_password)){
            //verify sucess !! User has loggin
            //create session
                $_SESSION['loggedin'] = True;
                $_SESSION['name'] = $this->username;
                $_SESSION['id'] = $admin_id;
                return True;
            }else{echo "Incorrect Password!";return False;}
            }else{echo "Incorrect Username";}
             $stmt->close();
            }
    }/*end function login*/
  }
?>