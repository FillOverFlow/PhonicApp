<?php
session_start();
include '../../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}
$sql = "SELECT * FROM quiz_detail ";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>รายละเอียดของข้อมูล</title>
</head>

<body>
    <!-- Section: Blog v.1 -->
    <section class="my-3 m-5">
        <!-- แสดดงข้อมูล quiz 1  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="container mt-2">
                    <div class="media border p-2">
                        <div class="media-body">
                            <h4>หัวข้อคำถาม</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="media border p-2">
                        <div class="media-body">
                            <h4>รูปคำถาม</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="media border p-2">
                        <div class="media-body">
                            <h4>เสียง</h4>
                            <p></p>
                            <h4>รูปแบบคำตอบ</h4>
                            <p></p>
                        </div>
                        
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="media border p-2">
                        <div class="media-body">
                            <h4>ตัวเลือกคำตอบ</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- แสดดงข้อมูล quiz 1-->
    </section>
</body>

</html>