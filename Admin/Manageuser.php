<?php 

include '../db_connection.php';
$sql ="SELECT * FROM user_account";
$query = mysqli_query($conn,$sql);

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
                                            <tr >
                                                <th>ลำดับ</th>
                                                <th>ชื่อผู้ใช้งาน</th>
                                                <th>รหัสผ่าน</th>
                                                <th>ชื่อ-สกุล</th>
                                                <th>ระดับ</th>
                                                <th>สถานศึกษา</th>
                                                <th>E-mail</th>
                                                <th>ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
                                            $i =1;
                                            while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                                        ?>
                                            <tr>
                                                <td><?= number_format($i);?></td>
                                                <td><?php echo $result["user_name"];?></td>
                                                <td><?php echo $result["user_pwd"];?></td>
                                                <td><?php echo $result["user_fullname"];?></td>
                                                <td><?php echo $result["user_position"];?></td>
                                                <td><?php echo $result["user_school"];?></td>
                                                <td><?php echo $result["user_email"];?></td>
                                                <td>
                                                    <a href="#" style="color: gray;" title="view" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></a>
                                                    <a href="edituser.php" style="color: green;" title="แก้ไขข้อมูล"><i class="far fa-edit"></i></a>
                                                    <a href="deleteuser.php"  style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a>
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

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- แสดงข้อมูลบน modal -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>ชื่อผู้ใช้งาน</b>  :  admin2</li>
                        <li class="list-group-item"><b>ชื่อผู้ใช้งาน</b>  :  admin2</li>
                        <li class="list-group-item"><b>ชื่อผู้ใช้งาน</b>  :  admin2</li>
                    </ul>
                <!-- แสดงข้อมูลบน modal -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

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