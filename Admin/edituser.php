<?php
//1. เชื่อมต่อ database: 
session_start();
include '../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$user_id = $_GET["user_id"];

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM user_account WHERE user_id='$user_id' ";
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
                        <h4 class="page-title">แก้ไขข้อมูลผู้ใช้งาน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="Manageuser.php">ข้อมูลผู้ใช้งาน</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลผู้ใช้งาน</li>
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
                            <form class="form-horizontal" action="script/edituser_script.php?user_id=<?php echo $_GET["user_id"]; ?>" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">ข้อมูลผู้ใช้งาน</h4>

                                    <div class="form-group row">
                                        <label for="edit_username" class="col-sm-3 text-right control-label col-form-label">ชื่อผู้ใช้งาน</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edit_username" id="edit_username" value="<?php echo $row["user_name"]; ?>" placeholder="กรอกชื่อผู้ใช้งาน" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_fname" class="col-sm-3 text-right control-label col-form-label">ชื่อ - สกุล</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edit_fname" id="edit_fname" value="<?php echo $row["user_fullname"]; ?>" placeholder="กรอกชื่อ - สกุล" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_position" class="col-sm-3 text-right control-label col-form-label">ระดับ</label>
                                        <div class="col-sm-6">
                                            <select class="select2 form-control custom-select" name="edit_position" style="width: 100%; height:36px;" required>
                                                <option value="ยังไม่ได้เลือก">กรุณาเลือก</option>
                                                <!-- เลือกนักเรียน -->
                                                <option value="นักเรียน" <?php if ($row["user_position"] == 'นักเรียน') echo ' selected="selected"'; ?>>นักเรียน</option>
                                                <!-- เลือกผู้ปกครอง -->
                                                <option value="ผู้ปกครอง" <?php if ($row["user_position"] == 'ผู้ปกครอง') echo ' selected="selected"'; ?>>ผู้ปกครอง</option>
                                                <!-- เลือกครู -->
                                                <option value="ครู" <?php if ($row["user_position"] == 'ครู') echo ' selected="selected"'; ?>>ครู</option>
                                                <!-- เลือกอาจารย์ -->
                                                <option value="อาจารย์" <?php if ($row["user_position"] == 'อาจารย์') echo ' selected="selected"'; ?>>อาจารย์</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_education" class="col-sm-3 text-right control-label col-form-label">สถานศึกษา</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edit_education" id="edit_education" value="<?php echo $row["user_school"]; ?>" placeholder="กรอกสถานศีกษา" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_email" class="col-sm-3 text-right control-label col-form-label">อีเมล์</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" name="edit_email" id="edit_email" value="<?php echo $row["user_email"]; ?>" placeholder="กรอกอีเมล์" required>
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
                                <p class="heading lead" id="myModalLabel">แก้ไขรหัสผ่านผู้ใช้งาน</p>

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
                                            <form action="script/changepassUser_script.php?user_id=<?php echo $_GET["user_id"]; ?>" onsubmit="return checkNewpass(this);" method="post">
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
                                                <button type="submit" class="btn btn-primary btn-sm">อัพเดทข้อมูล</button>
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
            document.location.href = 'Manageuser.php';
        }
    </script>
    <script>
        function checkPass() {

            str1 = document.getElementById("new_pass").value;

            if (str1.length < 8) {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร</span>";
                document.getElementById("new_pass").focus();
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