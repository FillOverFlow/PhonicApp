<?php
    require '../class/exam_class.php';

    $exam_id  = $_GET["exam_id"];
    $level = $_GET["level"];
    //use lesson class 
    $exam = new Exam();

    if($exam->delete($exam_id) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("ลบข้อมูลสำเรีจ")) {';//msg
        header("location:../viewExam.php?level=$level");
        echo '}';
        echo '</script>';
        exit;
    }
?>
