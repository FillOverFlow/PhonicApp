<?php
    require '../class/quiz_class.php';
    
    $params  = $_GET["lesson_id"];
    //use lesson class 
    $quiz = new Quiz();

    if($quiz->delete($params) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("ลบข้อมูลสำเรีจ")) {';//msg
        echo ' location.href="../ManageQuiz.php"';
        echo '}';
        echo '</script>';
        exit;
    }

?>