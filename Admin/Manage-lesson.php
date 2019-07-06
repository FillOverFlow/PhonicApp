<?php
session_start();
include '../db_connection.php';
if($_SESSION["loggedin"]!=True){
    //if not login redirect to login.php 
    header("location:login.php");
}
$sql = "SELECT * FROM lesson_detail ORDER BY `level` ASC";
$query = mysqli_query($conn, $sql);

$date = date("Y-m-d H:i:s");
$datenow = substr($date,0,10);

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <title>Administrator Phonic App by Aj.Aum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        
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
                            <table id="zero_config" class="table table-bordered table-sm table-hover">
                                <thead class="table-secondary">
                                    <tr>
                                        <th width="15px">ลำดับ</th>
                                        <th>Level</th>
                                        <th>บทเรียน</th>
                                        <th>คำอธิบายบทเรียน</th>
                                        <th>รูปบทเรียน</th>
                                        <th width="50px">ตัวเลือก</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        $datedb = $result['create_date'];
                                        $subdate = substr($datedb, 0,10);
                                        // echo "$subdate";
                                        if ($subdate == $datenow) {
                                          $new = '<span class="badge badge-danger badge-pill animated bounce tada infinite"> ล่าสุด </span>';
                                          // $colors = '#f5eded';
                                        }elseif ($subdate != $datenow) {
                                            $new = '';
                                            // $colors = '';
                                        }
                                        ?>
                                        <tr style="background-color:<?= $colors ?>" >
                                            <td ><?= number_format($i); ?></td>
                                            <td><?php echo $result["level"]; ?></td>
                                            <td><?php echo $result["lesson_name"]; ?></td>
                                            <td><?php echo $result["lesson_desc"]; ?> <?= $new ?></td>
                                            <td align="center"><a href="../<?php echo $result["small_image"]; ?>" target="_blank" title="แสดงรูปบทเรียน"><img src="../<?php echo $result["small_image"]; ?>" width="65px" height="25px"></a></td>

                                            <td width="65px;" align="center">
                                               <!--  <a href="#" style="color: gray;" title="view" class="view_data" id="<?php echo $result["lesson_id"]; ?>"><i class="fas fa-search"></i></a> -->
                                                <a href="JavaScript:if(confirm('คุณต้องการดูของ lesson ข้อมูลใช่หรือไม่ ?')==true){window.location='viewlesson.php?lesson_id=<?php echo $result["lesson_id"]; ?>';}" style="color: gray;" title="แก้ไขข้อมูล"><i class="fas fa-search"></i></a>

                                                <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')==true){window.location='script/dellesson_script.php?lesson_id=<?php echo $result["lesson_id"]; ?>';}" style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a>
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
                <div class="modal-dialog modal-lg" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <p class="heading lead" id="myModalLabel">ข้อมูลคำศัพท์  </p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="container-fluid">
                                    <div class="card" id="employee_detail1">
                                        <!-- แสดงข้อมูล -->
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
                    url: "script/showdetaillesson_script.php",
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