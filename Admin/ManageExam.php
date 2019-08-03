<?php
session_start();
include '../db_connection.php';
if (!isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"] == '';
    header("location:login.php");
}
$sql = "SELECT * FROM exam_detail ORDER BY create_date DESC ";
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
                        <h4 class="page-title">จัดการข้อมูล Exam</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูล Exam</li>
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
                        <a href="form-add-exam.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูล</a>
                    </div>
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 col-lg-3 col-xlg-2">
                                <div class="card card-hover pointer ">
                                    <div class="box bg-cyan text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <h6 class="text-white">Dashboard</h6>
                                        <span class="badge badge-pill badge-light">0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 col-xlg-2">
                                <div class="card card-hover pointer ">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <h6 class="text-white">Dashboard</h6>
                                        <span class="badge badge-pill badge-light">0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 col-xlg-2">
                                <div class="card card-hover pointer ">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <h6 class="text-white">Dashboard</h6>
                                        <span class="badge badge-pill badge-light">0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 col-xlg-2">
                                <div class="card card-hover pointer ">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <h6 class="text-white">Dashboard</h6>
                                        <span class="badge badge-pill badge-light">0</span>
                                    </div>
                                </div>
                            </div>

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
                            <div class="">
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

            <!-- Modal แสดง editQuiz  -->
            <div class="modal fade" id="dataModalEditExam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <p class="heading lead" id="myModalLabel">แก้ไข Exam</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="text">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="">ระดับ level : </label>
                                                <input type="text" id="level" name="level" class="form-control input-lg" placeholder="ระดับ level" value="">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="">หัวข้อคำถาม : </label>
                                                <input type="text" id="quiztitle" name="quiztitle" class="form-control input-lg" placeholder="quiztitle" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">รูปภาพคำถาม : </label>
                                                <input type="file" id="quizimg" name="quizimg" class="form-control input-lg" placeholder="quizimg" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">เสียง : </label>
                                                <input type="text" id="quizsound" name="quizsound" class="form-control input-lg" placeholder="quizsound" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">รูปแบบคำตอบ : </label>
                                                <select class="form-control" id="type_style" style="width: 100%; height:36px;" required>
                                                    <option value="">-เลือก รูปแบบคำตอบ-</option>
                                                    <option value="0">คำตอบเป็นข้อความ</option>
                                                    <option value="1">คำตอบเป็นภาพ</option>
                                                    <option value="2">คำตอบเป็นเสียง</option>
                                                </select>
                                            </div>
                                            <hr>
                                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                                            <div id="formbox1">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_a[]" id="ans_a" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-1 text-right control-label col-form-label">B.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_b[]" id="ans_b" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-2 text-right control-label col-form-label">C.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_c[]" id="ans_c" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก D.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_d[]" id="ans_d" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-1 text-right control-label col-form-label">E.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_e[]" id="ans_e" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-2 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="Ans[]" id="Ans" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->

                                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->
                                            <div id="formbox2">
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="ans_a[]" class="form-control" id="ans1_a" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">B.</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="ans_b[]" class="form-control" id="ans1_b" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">C.</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="ans_c[]" class="form-control" id="ans1_c" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">D.</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="ans_d[]" class="form-control" id="ans1_d" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">E.</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="ans_e[]" class="form-control" id="ans1_e" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="Ans1[]" class="form-control" id="ans" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->

                                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                                            <div id="formbox3">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_a2[]" id="ans_a" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-1 text-right control-label col-form-label">B.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_b2[]" id="ans_b" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-2 text-right control-label col-form-label">C.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_c2[]" id="ans_c" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก D.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_d2[]" id="ans_d" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-1 text-right control-label col-form-label">E.</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="ans_e2[]" id="ans_e" class="form-control">
                                                    </div>
                                                    <label for="" class="col-sm-2 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="Ans2[]" id="Ans" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                                            <button type="submit" class="btn btn-primary btn-sm">อัพเดทข้อมูล</button>
                                            <button type="reset" class="btn btn-danger btn-sm">ยกเลิก</button>
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

            <!-- Modal แสดง editQuiz -->

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
            var quiz_id = $(this).attr("id");
            if (quiz_id != '') {
                $.ajax({
                    url: "script/showprocessExam_script.php",
                    method: "POST",
                    data: {
                        id: quiz_id
                    },
                    success: function(data) {
                        $('#employee_detail1').html(data);
                        $('#dataModal1').modal('show');
                    }
                });
            }
        });
        $(document).on('click', '.edit_exam', function() {
            console.log('click edit');
        var quiz_id = $(this).attr("id");
        if (quiz_id != '') {
            $.ajax({
            url: "script/editprocessExam_script.php",
            method: "POST",
            data: {
                id: quiz_id
            },
            success: function(data) {
                console.log(data)
                $('#employee_detail1').html(data);
                $('#dataModal1').modal('show');
            }
            });
        }
        });
    </script>
    <script>
        $(function() {
            $('#formbox1').hide();
            $('#formbox2').hide();
            $('#formbox3').hide();
            $('#type_style').change(function() {
                if ($('#type_style').val() == '0') {
                    $('#formbox1').show();
                } else {
                    $('#formbox1').hide();
                }
                if ($('#type_style').val() == '1') {
                    $('#formbox2').show();
                } else {
                    $('#formbox2').hide();
                }
                if ($('#type_style').val() == '2') {
                    $('#formbox3').show();
                } else {
                    $('#formbox3').hide();
                }
            });
        });
    </script>
</body>

</html>