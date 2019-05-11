<?php

    
    require '../class/lesson_class.php';
    /*location word image*/
    $filename = $_FILES['file']['name'];  //file image
    $location = "../../img/word/".$filename;
    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    /* Valid Extensions */
    $valid_extensions = array("jpg","jpeg","png");
    /* Check file extension */
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
    $uploadOk = 0;
    }
    if($uploadOk == 0){
        echo 0;
    }else{
        /* Upload file */
        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
           echo $location;
        }else{
           echo 0;
        }
    }
    //prepare params and add word  ** wordname => word_show , wordsound => word_speak
    /*params for add word */
    $params  = array(
        'lesson_id' => $_POST['lesson_id'],
        'word_no'   => $_POST['word_no'],
        'page_no'   => $_POST['page_no'],
        'word_show' => $_POST['wordname'],
        'word_speak'=> $_POST['wordsound'],
        'word_image'=> $_FILES['file']['name']
    );
    print_r($params);
    

?>