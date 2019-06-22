<?php
/* class for add lesson and word */

Class Lesson{
    function add_word($params){ //params -> lesson_id , word_no, page_no, word_show, word_speak, word_image
        include '../../db_connection.php';
        //variable params 
        $lesson_id = $params['lesson_id'];
        $word_no   = $params['word_no'];
        $page_no   = $params['page_no'];
        $word_show = $params['word_show'];
        $word_speak= $params['word_speak'];
        $word_image= $params['word_image'];
        $create_date= date('Y-m-d h:i:s');
        //add params word to add
        $sql = "insert word_detail(lesson_id,word_no,page_no,word_show,word_speak,word_image,create_date) 
                values('$lesson_id','$word_no','$page_no','$word_show','$word_speak','$word_image','$create_date')";
        $conn->query($sql);
        if($conn){
            // return true if success 
            return true;
        }else{
            // return false if failk
            return false;
        }
    }
    
    function add_lesson($params){ //params ->lesson_id,level,lesson_no,lesson_desc,small_image,big_image,maxpage,create_data
        //add word and save lesson to DB
        include '../../db_connection.php';
        $lesson_id   = $params['lesson_id'];
        $lesson_name = $params['lesson_name'];
        $level       = $params['level'];
        $lesson_no   = $params['lesson_no'];
        $lesson_desc = $params['lesson_desc'];
        $small_image = $params['small_image'];
        $big_image   = $params['big_image'];
        $maxpage     = $params['maxpage'];
        $create_date= date('Y-m-d h:i:s');
        //sql 
        $sql = "insert lesson_detail(lesson_id,level,lesson_no,lesson_name,lesson_desc,small_image,big_image,maxpage,create_date)
                values('$lesson_id','$level','$lesson_no','$lesson_name','$lesson_desc','$small_image','$big_image','$maxpage','$create_date')";
        $conn->query($sql);
        if($conn){
            // return true if success
            echo 'save data'.$sql;
            return true;
        }else{
            // return false if failk
            echo 'not save '.$sql;
            return false;
        }

    }
    function edit_word($params){
        include '../../db_connection.php';
        //variable params 
        // $lesson_id = $params['lesson_id'];
        // $word_no   = $params['word_no'];
        // $page_no   = $params['page_no'];
        $word_id   = $params['word_id'];
        $word_show = $params['word_show'];
        $word_speak= $params['word_speak'];
        $word_image= $params['word_image'];
        $create_date= date('Y-m-d h:i:s');

        //sql 
        $sql = "update word_detail set word_show = '$word_show',word_speak='
        $word_speak',word_image='$word_image',create_date='$create_date' 
        where word_id = '$word_id'";
        //echo 'SQL'.$sql;
        if($conn->query($sql)){
            echo 'update';
            return true;
        }else{
            //echo 'error case '.mysqli_error($conn);
            echo $sql;
            echo "<br>";
            return false;
        }
    }
    function delete_lesson($lesson_id){
        include '../../db_connection.php';
        
        // delete lesson
        $sql = "delete from lesson_detail where lesson_id = '$lesson_id'";
        echo $sql;
        $conn->query($sql);
        
        // delete word
        $sql_word = "delete from word_detail where lesson_id = '$lesson_id'";
        echo $sql_word;
        $conn->query($sql_word);

        //check result 
        if($conn->query($sql) and $conn->query($sql_word)){
            echo 'delete';
            return true;
        }else{
            echo $sql;
            echo "<br>";
            echo $sql_word;
            return false;
        }
    }
    function delete_word($word_id){
        include '../../db_connection.php';
        
        // delete word
        $sql_word = "delete from word_detail where word_id = '$word_id'";
        echo $sql_word;


        //check result 
        if($conn->query($sql_word)){
            echo 'delete';
            return true;
        }else{
            echo $sql;
            echo "<br>";
            echo $sql_word;
            return false;
        }
    }
}
