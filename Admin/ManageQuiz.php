<?php
session_start();
include '../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}
$sql = "SELECT * FROM lesson_detail ORDER BY create_date";
$query = mysqli_query($conn, $sql);
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
                        <h4 class="page-title">จัดการข้อมูล Quiz</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูล Quiz</li>
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
                        <div class="row">
                            <div class="col-6">
                                <a href="form-add-quiz.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูล</a>
                            </div>
                        </div>
                    </div>
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-bordered table-sm table-hover">
                                <thead class="table-secondary">

                                    <tr>
                                        <th width="20px" align="center">ลำดับ</th>
                                        <th>level</th>
                                        <th>lesson</th>
                                        <th>คำอธิบายบทเรียน</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr style="background-color:<?= $color ?>">
                                            <td align="center"><?= number_format($i); ?></td>
                                            <td><?= $result["level"] ?></td>
                                            <td><?= $result["lesson_name"] ?></td>
                                            <td><?= $result["lesson_desc"] ?></td>

                                            <td width="65px;" align="center">
                                            <a href="JavaScript:if(confirm('คุณต้องการดูข้อมูลของ Quiz ใช่หรือไม่ ?')==true){window.location='viewquiz.php?lesson_id=<?php echo $result["lesson_id"]; ?>';}"  title="view" style="color: gray;"><i class="fas fa-search"></i></a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')==true){window.location='script/delquiz_script.php?lesson_id=<?php echo $result["lesson_id"]; ?>';}" style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>

                            </table>
                            <?php
                            mysqli_close($conn);
                            ?>

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
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /* Basic Table */
        $('#zero_config').DataTable();
    </script>
</body>

</html>