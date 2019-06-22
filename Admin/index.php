<?php
session_start();
include '../db_connection.php';
include 'script/count_badge.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
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
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>  
                </div>
                <br>
                <!-- Bar chart -->
                <!-- Sales chart -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">กราฟแสดง คะแนน</h4>
                                        <h5 class="card-subtitle">ของผู้ใช้งาน</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-user m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">2540</h5>
                                                    <small class="font-light">Total Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-plus m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">120</h5>
                                                    <small class="font-light">New Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">656</h5>
                                                    <small class="font-light">Total Shop</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-tag m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">9540</h5>
                                                    <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-table m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">100</h5>
                                                    <small class="font-light">Pending Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-globe m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">8540</h5>
                                                    <small class="font-light">Online Orders</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
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