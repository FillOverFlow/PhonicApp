<?php
    require '../class/lesson_class.php';

    $params  = $_GET["word_id"];
    $lesson_id = $_GET["lesson_id"];
    
    //use lesson class 
    $lesson = new Lesson();

    if($lesson->delete_word($params) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("บันทึกข้อมูลสำเร็จ")) {';//msg
        header("location:../viewlesson.php?lesson_id=$lesson_id");
        echo '}';
        echo '</script>';
    }
?>
