<?php
//1. เชื่อมต่อ database: 
session_start();
include '../db_connection.php';
if (!isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"] == '';
    header("location:login.php");
}
$admin_id = $_GET["admin_id"];
//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM admin_account WHERE admin_id='$admin_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
// extract($row);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <title>Administrator Phonic App by Aj.Aum</title>
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
                        <h4 class="page-title">เพิ่มข้อมูลผู้ดูแลระบบ</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="Manageadmin.php">ข้อมูลผู้ดูแลระบบ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลผู้ดูแลระบบ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- ฟอร์มเพิ่มข้อมูลผู้ใช้งาน -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="script/editadmin_script.php?admin_id=<?php echo $_GET["admin_id"]; ?>" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">ข้อมูลผู้ดูแลระบบ</h4>

                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 text-right control-label col-form-label">ชื่อผู้ใช้งาน</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="กรอกชื่อผู้ใช้งาน" onchange="checkUser();" value="<?= $row["admin_username"]; ?>" disabled>
                                            <span id="txtCheck"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">ชื่อ - สกุล</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="กรอกชื่อ - สกุล" value="<?= $row["admin_fullname"]; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 text-right control-label col-form-label">อีเมล์</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="กรอกอีเมล์" value="<?= $row["admin_email"]; ?>" required>
                                        </div>
                                    </div>
                                    <!-- เปลี่ยนรหัสผ่าน -->
                                    <div class="form-group row">
                                        <label for="edit_fname" class="col-sm-3 text-right control-label col-form-label"></label>
                                        <div class="col-sm-6">
                                            <a href="#" data-toggle="modal" data-target="#dataModal1">เปลี่ยนรหัสผ่าน</a>
                                        </div>
                                    </div>


                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"> อัพเดทข้อมูล</i></button>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="gohome()"><i class="far fa-times-circle"> ยกเลิก</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ฟอร์มเพิ่มข้อมูลผู้ใช้งาน -->

                <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->
                <div class="modal fade" id="dataModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead" id="myModalLabel">แก้ไขรหัสผ่านผู้ดูแลระบบ</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>
                           
                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="row" id="employee_detail1">
                                        <div class="col-sm-12" align="left">
                                            <!-- ฟอร์มแก้ไขรหัสผ่าน -->
                                            <form action="script/changepassAdmin_script.php?admin_id=<?php echo $_GET["admin_id"]; ?>" onsubmit="return checkNewpass(this);" method="post">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">รหัสผ่านเดิม : </label>
                                                    <input type="password" id="old_pass" name="old_pass" class="form-control input-lg" placeholder="รหัสผ่านเดิม" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">รหัสผ่านใหม่ : </label>
                                                    <input type="password" id="new_pass" name="new_pass" class="form-control input-lg" placeholder="รหัสผ่านใหม่" onchange="checkPass();" required>
                                                    <span id="txtCheck2"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">ยืนยันรหัสผ่านใหม่ : </label>
                                                    <input type="password" id="new_pass2" name="new_pass2" class="form-control input-lg" placeholder="ยืนยันรหัสผ่านใหม่" required>
                                                    <span id="txtCheck2"></span>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm">เปลี่ยนรหัสผ่าน</button>
                                                <button type="reset" class="btn btn-danger btn-sm">ยกเลิก</button>
                                                <!-- ฟอร์มแก้ไขรหัสผ่าน -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->

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
    <script>
        function gohome() {
            document.location.href = 'Manageadmin.php';
        }
    </script>
    <script>
        function checkPass() {

            str1 = document.getElementById("new_pass").value;
            str2 = document.getElementById("old_pass").value;

            if (str1.length < 8) {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร</span>";
                document.getElementById("new_pass").focus();
            }
            if (str1 == str2) {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านเดิมและรหัสผ่านใหม่ตรงกัน !!!</span>";
                document.getElementById("new_pass").focus();
                return false;
            } else {
                document.getElementById("txtCheck2").innerHTML = "";
            }
        }

        function checkNewpass(form) {

            str1 = document.getElementById("new_pass").value;
            str2 = document.getElementById("new_pass2").value;

            if (str1 == str2) {
                return true;
            } else {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านใหม่ไม่ตรงกัน !!!</span>";
                document.getElementById("new_pass2").focus();
                return false;
            }
        }
    </script>
</body>

</html>