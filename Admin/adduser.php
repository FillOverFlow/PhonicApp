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
                        <h4 class="page-title">เพิ่มข้อมูลผู้ใช้งาน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="Manageuser.php">ข้อมูลผู้ใช้งาน</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลผู้ใช้งาน</li>
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
                            <form class="form-horizontal" action="script/adduser_script.php" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">ข้อมูลผู้ใช้งาน</h4>

                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 text-right control-label col-form-label">ชื่อผู้ใช้งาน</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="กรอกชื่อผู้ใช้งาน" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 text-right control-label col-form-label">รหัสผ่าน</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="กรอกรหัสผ่าน" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">ชื่อ - สกุล</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="กรอกชื่อ - สกุล" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Position" class="col-sm-3 text-right control-label col-form-label">ระดับ</label>
                                        <div class="col-sm-6">
                                            <select class="select2 form-control custom-select" name="Position" style="width: 100%; height:36px;" required >
                                                    <option value="">-เลือกระดับ-</option>
                                                    <option value="นักเรียน">นักเรียน</option>
                                                    <option value="ผู้ปกครอง">ผู้ปกครอง</option>
                                                    <option value="อาจารย์">อาจารย์</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="education" class="col-sm-3 text-right control-label col-form-label">สถานศึกษา</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="education" id="education" placeholder="กรอกสถานศีกษา" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 text-right control-label col-form-label">อีเมล์</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="กรอกอีเมล์" required>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button  type="submit" class="btn btn-primary btn-sm" ><i class="fas fa-check"> บันทึกข้อมูล</i></button>

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
    

</body>

</html>