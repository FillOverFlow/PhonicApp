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
                        <h4 class="page-title">จัดการข้อมูลบทเรียนและคำศัพท์</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลบทเรียนและคำศัพท์</li>
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
                            <a href="form-add-lesson.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูลบทเรียน</a>
                        </div>
                     <!-- ปุ่มเพิ่มข้อมุล -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered table-sm">
                                        <thead class="table-secondary">
                                            <tr >
                                                <th width = "15px">ลำดับ</th>
                                                <th>Level</th>
                                                <th>ชื่อบทเรียน</th>
                                                <th>คำอธิบายบทเรียน</th>
                                                <th>รูปบทเรียน</th>
                                                <th width ="50px">ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>Lesson 1</td>
                                                <td>Letter Sounds</td>
                                                <td><img src="" alt="image-leeson" height="50" width="50"></td>
                                                <td>
                                                    <a href="#" style="color: gray;" title="view"><i class="fas fa-search"></i></a>
                                                    <a href="form-edit-lesson.php" style="color: green;" title="แก้ไขข้อมูล"><i class="far fa-edit"></i></a>
                                                    <a href="" style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
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
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
         /* Basic Table */
        $('#zero_config').DataTable();
    </script>

</body>

</html>