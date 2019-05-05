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
        /* ใน*/
        function add(){
            echo 'class add new user work';
        }
        function edit(){
            echo 'class edit user';
        }   
        function delete(){
            echo 'delete user';
        }
    }


?>