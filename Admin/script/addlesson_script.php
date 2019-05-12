<?php
    //use class lesson to add lesson
    require '../class/lesson_class.php';
    //prepare params 
    /*location lesson image*/
    
    if($_FILES){
        /* คำนวณลำดับ ของ lesson_no */
        include '../../db_connection.php';
        $level       = $_POST['level'];
        $sql = "SELECT MAX(lesson_no) from lesson_detail WHERE level = $level";
        $result  = $conn->query($sql);
        $row = $result->fetch_assoc();

        $lesson_no   = $row['MAX(lesson_no)'];
        $lesson_id   = $_POST['lesson_id'];
        $lesson_name = $_POST['lesson_name'];
        $lesson_desc = $_POST['lesson_desc'];
        $maxpage     = $_POST['maxpage'];
        $small_image = $_FILES['small_image']['name'];  //file small image
        $location = "../../img/level".$level."/";
        

        //params zone 
        $params = array(
            'level'       => $level,
            'lesson_id'   => $lesson_id,
            'lesson_no'   => $lesson_no+1,  //+1 จะกลายเป็น Lesson_no 
            'small_image' => 'img/level'.$level.'/'.$small_image,
            'big_image'   => 'img/level'.$level.'/'.$small_image,
            'lesson_name' => $lesson_name,
            'lesson_desc' => $lesson_desc,
            'maxpage'     => $maxpage,
        );
        print_r($params);
        // //use class to upload lesson
        // $lesson = new Lesson();
        // $lesson->add_lesson($params);
        // //upload image to directory location
        // if(move_uploaded_file($_FILES['small_image']['tmp_name'],$location.$_FILES['small_image']['name'])){
        //     //echo 'uploadimage:'.$location.$_FILES['small_image']['name'];
        // }else{
        // echo "<script>alert('No image');</script>";
        // }
    }
    
?>