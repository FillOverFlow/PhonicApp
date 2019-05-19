<?php
//1. เชื่อมต่อ database: 
session_start();
include '../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

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
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="กรอกชื่อ - สกุล"     value="<?= $row["admin_fullname"]; ?>" required>
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
        function checkOK(form) {

            str1 = document.getElementById("txtCheck").innerHTML;
            str2 = document.getElementById("txtCheck2").innerHTML;

            if (str1.length > 0) {
                document.getElementById("username").focus();
                return false;
            } else if (str2.length > 0) {
                document.getElementById("password").focus();
                return false;
            } else {
                checkPass();
                str2 = document.getElementById("txtCheck2").innerHTML;
                if (str2.length > 0) {
                    document.getElementById("password").focus();
                    return false;
                }
                checkPass2();
                str2 = document.getElementById("txtCheck2").innerHTML;
                if (str2.length > 0) {
                    document.getElementById("password").focus();
                    return false;
                }
            }

            return true;
        }

        function checkPass() {

            str1 = document.getElementById("password").value;

            if (str1.length < 8) {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร</span>";
                document.getElementById("password").focus();
            } else {
                document.getElementById("txtCheck2").innerHTML = "";
            }
        }

        function checkPass2() {

            str1 = document.getElementById("password").value;
            str2 = document.getElementById("con_password").value;

            if (str1 == str2) {
                document.getElementById("txtCheck2").innerHTML = "";
            } else {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านไม่ตรงกัน</span>";
                document.getElementById("con_password").focus();
            }
        }


        function checkUser() {

            str = document.getElementById("username").value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "0") {
                        //Do nothing
                        document.getElementById("txtCheck").innerHTML = "";
                        //return true;
                    } else {

                        document.getElementById("txtCheck").innerHTML = "<span style='color:red'>ชื่อนี้มีผู้ใช้งานแล้ว</span>";
                        document.getElementById("username").focus();
                        //return false;
                    }

                }
            }
            xmlhttp.open("GET", "script/getadmin_script.php?q=" + str, true);
            xmlhttp.send();

        }
    </script>

</body>

</html>