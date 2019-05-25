<?php
session_start();
include '../db_connection.php';
if($_SESSION["loggedin"]!=True){
    //if not login redirect to login.php 
    header("location:login.php");
}
$sql = "SELECT * FROM user_account ORDER BY create_date DESC";
$query = mysqli_query($conn, $sql);

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
                        <h4 class="page-title">จัดการข้อมูลผู้ใช้งาน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลผู้ใช้งาน</li>
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
                        <a href="adduser.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูล</a>
                    </div>
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-bordered table-sm table-hover">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อผู้ใช้งาน</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ระดับ</th>
                                        <th>สถานศึกษา</th>
                                        <th>E-mail</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?= number_format($i); ?></td>
                                            <td><?php echo $result["user_name"]; ?></td>
                                            <td><?php echo $result["user_fullname"]; ?></td>
                                            <td><?php echo $result["user_position"]; ?></td>
                                            <td><?php echo $result["user_school"]; ?></td>
                                            <td><?php echo $result["user_email"]; ?></td>
                                            <td width="65px;" align="center">
                                                <a href="#" style="color: gray;" title="view" class="view_data" id="<?php echo $result["user_id"]; ?>"><i class="fas fa-search"></i></a>

                                                <a href="JavaScript:if(confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่ ?')==true){window.location='edituser.php?user_id=<?php echo $result["user_id"]; ?>';}" style="color: green;" title="แก้ไขข้อมูล"><i class="far fa-edit"></i></a>

                                                <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')==true){window.location='script/deluser_script.php?user_id=<?php echo $result["user_id"]; ?>';}" style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a>
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

            <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->
            <div class="modal fade" id="dataModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-info" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <p class="heading lead" id="myModalLabel">รายละเอียดข้อมูล</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="row" id="employee_detail1">
                                    <!-- แสดงข้อมูล -->
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
    <!-- แสดงข้อมูล modal -->
    <script type="text/javascript">
        $(document).on('click', '.view_data', function() {
            var user_id = $(this).attr("id");
            if (user_id != '') {
                $.ajax({
                    url: "script/showprocess_script.php",
                    method: "POST",
                    data: {
                        id: user_id
                    },
                    success: function(data) {
                        $('#employee_detail1').html(data);
                        $('#dataModal1').modal('show');
                    }
                });
            }
        });
    </script>

</body>

</html>