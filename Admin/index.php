<?php
session_start();
include '../db_connection.php';
include 'script/count_badge.php';

if (!isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"] == '';
    header("location:login.php");
}

$sql = "SELECT * FROM admin_account WHERE admin_id = '".$_SESSION["id"]."'";
$query = mysqli_query($conn, $sql);
$objResult = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Administrator Phonic App by Aj.Aum</title>
    <style>
        .pointer {
            cursor: pointer;
        }
    </style>
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
                        <h4 class="page-title">Dashboard </h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">แผงควบคุม</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Sales Cards  -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover pointer " onclick="myFunction()">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Dashboard</h6>
                                <span class="badge badge-pill badge-light">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-star"></i></h1>
                                <h6 class="text-white">ผู้ดูแลระบบ</h6>
                                <span class="badge badge-pill badge-light"><?php echo $num_admins; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white">ผู้ใช้งาน</h6>
                                <span class="badge badge-pill badge-light"><?php echo $num_accounts; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-note-plus"></i></h1>
                                <h6 class="text-white">บทเรียนและคำศัพท์</h6>
                                <span class="badge badge-pill badge-light"><?php echo $num_words; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-tooltip-edit"></i></h1>
                                <h6 class="text-white">Quiz</h6>
                                <span class="badge badge-pill badge-light"><?php echo $num_quizs; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-tooltip-text"></i></h1>
                                <h6 class="text-white">Exam</h6>
                                <span class="badge badge-pill badge-light"><?php echo $num_exams; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                </div>
                <!-- Bar chart -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>  
                </div>
                <br>
                <!-- Bar chart -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include 'template/footer.php'; ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        function myFunction() {
            location.href = "index.php";
            document.getElementById("myP").style.cursor = "pointer";
        }
    </script>
    <?php include 'script/bargraph_script.php'; ?>

</body>

</html>