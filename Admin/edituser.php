<?php
//1. เชื่อมต่อ database: 
include '../db_connection.php';  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$user_id = $_GET["user_id"];

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM user_account WHERE user_id='$user_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
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
        <?php include 'template/menu.php';?>
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
                            <form class="form-horizontal" action="script/edituser_script.php?user_id=<?php echo $_GET["user_id"];?>" method="post" >
                                <div class="card-body">
                                    <h4 class="card-title">ข้อมูลผู้ใช้งาน</h4>

                                    <div class="form-group row">
                                        <label for="edit_username" class="col-sm-3 text-right control-label col-form-label">ชื่อผู้ใช้งาน</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edit_username" id="edit_username" value="<?php echo $row["user_name"]; ?>" placeholder="กรอกชื่อผู้ใช้งาน">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_password" class="col-sm-3 text-right control-label col-form-label">รหัสผ่าน</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="edit_password" id="edit_password" value ="<?php echo $row["user_pwd"]; ?>" placeholder="กรอกรหัสผ่าน">
                                            <!-- <input type="checkbox" onclick="myFunction()"> แสดงรหัสผ่าน -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_fname" class="col-sm-3 text-right control-label col-form-label">ชื่อ - สกุล</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edit_fname" id="edit_fname" value ="<?php echo $row["user_fullname"]; ?>" placeholder="กรอกชื่อ - สกุล">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_position" class="col-sm-3 text-right control-label col-form-label">ระดับ</label>
                                        <div class="col-sm-6">
                                            <select class="select2 form-control custom-select" name="edit_position" style="width: 100%; height:36px;">
                                                <option value="ยังไม่ได้เลือก">กรุณาเลือก</option>
                                                <!-- เลือกนักเรียน -->
                                                <option value="นักเรียน"<?php if ($row["user_position"] == 'นักเรียน') echo ' selected="selected"'; ?>>นักเรียน</option>
                                                <!-- เลือกผู้ปกครอง -->
                                                <option value="ผู้ปกครอง"<?php if ($row["user_position"] == 'ผู้ปกครอง') echo ' selected="selected"'; ?>>ผู้ปกครอง</option>
                                                <!-- เลือกครู -->
                                                <option value="ครู"<?php if ($row["user_position"] == 'ครู') echo ' selected="selected"'; ?>>ครู</option>
                                                <!-- เลือกอาจารย์ -->
                                                <option value="อาจารย์"<?php if ($row["user_position"] == 'อาจารย์') echo ' selected="selected"'; ?>>อาจารย์</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_education" class="col-sm-3 text-right control-label col-form-label">สถานศึกษา</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edit_education" id="edit_education" value ="<?php echo $row["user_school"]; ?>" placeholder="กรอกสถานศีกษา">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_email" class="col-sm-3 text-right control-label col-form-label">อีเมล์</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" name="edit_email" id="edit_email" value ="<?php echo $row["user_email"]; ?>"placeholder="กรอกอีเมล์">
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary btn-sm" ><i class="fas fa-check"> อัพเดทข้อมูล</i></button>

                                        <button type="button" class="btn btn-danger btn-sm" onclick='window.history.back()'><i class="far fa-times-circle"> ยกเลิก</i></button>
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
            <?php include 'template/footer.php';?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script>
    // แสดงรหัสผ่าน
        function myFunction() {
            var x = document.getElementById("edit_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    

</body>

</html>