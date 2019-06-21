<?php
    require '../class/exam_class.php';

    $exam_id  = $_GET["exam_id"];
    
    //use lesson class 
    $exam = new Exam();

    if($exam->delete($exam_id) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("ลบข้อมูลสำเรีจ")) {';//msg
        echo ' location.href="../ManageExam.php"';
        echo '}';
        echo '</script>';
        exit;
    }
?>
