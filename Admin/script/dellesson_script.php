<?php
    require '../class/lesson_class.php';

    $params  = $_GET["lesson_id"];
    
    //use lesson class 
    $lesson = new Lesson();

    if($lesson->delete_lesson($params) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("ลบข้อมูลสำเรีจ")) {';//msg
        echo ' location.href="../Manage-lesson.php"';
        echo '}';
        echo '</script>';
        exit;
    }
?>
