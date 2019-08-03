<?php
session_start();
include '../db_connection.php';
if (!isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"] == '';
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <title>Administrator Phonic App by Aj.Aum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        <?php include 'template/menu.php'; ?>
        <!-- End Topbar header -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">จัดการข้อมูล Exam</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูล Exam</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- แสดงตารางข้อมูลผู้ใช้งาน -->
                <div class="card">
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body">
                        <a href="form-add-exam.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูล</a>
                    </div>
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Card -->
                            <div class="col-md-6 col-lg-3 col-xlg-6">
                                <div class="card bg-light card-hover">
                                    <!-- Card image -->
<!--                                    <div class="view overlay">-->
<!--                                        <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">-->
<!--                                        <a href="#!">-->
<!--                                            <div class="mask rgba-white-slight"></div>-->
<!--                                        </a>-->
<!--                                    </div>-->
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <h4 class="card-title">Exam level 1</h4>
                                        <!-- Text -->
                                        <p class="card-text">สามารถดูรายละเอียดข้อมูลของ Exam level 1</p>
                                        <!-- Button -->
                                        <a href="viewExam.php?level=1" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>

                                </div>
                            </div>
                            <!-- Card -->

                            <!-- Card -->
                            <div class="col-md-6 col-lg-3 col-xlg-6">
                                <div class="card bg-light card-hover">
                                    <!-- Card image -->
<!--                                    <div class="view overlay">-->
<!--                                        <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">-->
<!--                                        <a href="#!">-->
<!--                                            <div class="mask rgba-white-slight"></div>-->
<!--                                        </a>-->
<!--                                    </div>-->
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <h4 class="card-title">Exam level 2</h4>
                                        <!-- Text -->
                                        <p class="card-text">สามารถดูรายละเอียดข้อมูลของ Exam level 2</p>
                                        <!-- Button -->
                                        <a href="viewExam.php?level=2" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>

                                </div>
                            </div>
                            <!-- Card -->

                            <!-- Card -->
                            <div class="col-md-6 col-lg-3 col-xlg-6">
                                <div class="card bg-light card-hover">
                                    <!-- Card image -->
<!--                                    <div class="view overlay">-->
<!--                                        <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">-->
<!--                                        <a href="#!">-->
<!--                                            <div class="mask rgba-white-slight"></div>-->
<!--                                        </a>-->
<!--                                    </div>-->
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <h4 class="card-title">Exam level 3</h4>
                                        <!-- Text -->
                                        <p class="card-text">สามารถดูรายละเอียดข้อมูลของ Exam level 3</p>
                                        <!-- Button -->
                                        <a href="viewExam.php?level=3" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>

                                </div>
                            </div>
                            <!-- Card -->

                            <!-- Card -->
                            <div class="col-md-6 col-lg-3 col-xlg-6">
                                <div class="card bg-light card-hover">
                                    <!-- Card image -->
<!--                                    <div class="view overlay">-->
<!--                                        <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">-->
<!--                                        <a href="#!">-->
<!--                                            <div class="mask rgba-white-slight"></div>-->
<!--                                        </a>-->
<!--                                    </div>-->
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <h4 class="card-title">Exam level 4</h4>
                                        <!-- Text -->
                                        <p class="card-text">สามารถดูรายละเอียดข้อมูลของ Exam level 4</p>
                                        <!-- Button -->
                                        <a href="viewExam.php?level=4" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>

                                </div>
                            </div>
                            <!-- Card -->
                        </div>

                    </div>
                </div>
                <!-- Sales chart -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include 'template/footer.php'; ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>

    </script>
    <!-- End Wrapper -->
    <!-- All Jquery -->

</body>

</html>