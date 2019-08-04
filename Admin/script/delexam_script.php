<?php
    require '../class/exam_class.php';
    if(isset($_GET['level'])){
        $level = $_GET["level"];
    }


    if(isset($_GET['exam_id']))
    {
        //delete one 
        $exam_id  = $_GET["exam_id"];
        //use lesson class 
        $exam = new Exam();
        //delete one 
        if($exam->delete($exam_id) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("ลบข้อมูลสำเรีจ")) {';//msg
        header("location:../viewExam.php?level=$level");
        echo '}';
        echo '</script>';
        exit;
        }
    }
    if(isset($_GET['delete_all'])){
        //delete all 
        $exam = new Exam();
        if($exam->delete_all($level) == true){
            echo '<script language="javascript" type="text/javascript"> ';
            echo 'if(!alert("ลบข้อมูลสำเรีจ")) {';//msg
            header("location:../viewExam.php?level=$level");
            echo '}';
            echo '</script>';
            exit;
        }

    }
    
    
?>
