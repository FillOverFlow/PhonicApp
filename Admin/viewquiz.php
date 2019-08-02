<?php
//1. เชื่อมต่อ database: 
session_start();
include '../db_connection.php';
if ($_SESSION["loggedin"] != True) {
  //if not login redirect to login.php 
  header("location:login.php");
}  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$lesson_id = $_GET["lesson_id"];
$sql = "SELECT * FROM quiz_detail WHERE lesson_id = '$lesson_id' ORDER BY create_date DESC";
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
            <h4 class="page-title">view ข้อมูล Quiz</h4>
            <div class="ml-auto text-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="ManageQuiz.php">จัดการข้อมูล Quiz Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">view ข้อมูล Quiz</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- Container fluid  -->
      <div class="container-fluid">

        <!-- ฟอร์ม view quiz -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- ปุ่มเพิ่มข้อมุล -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="col-6">
                    <p style="text-align:right"><span style="color:red;" class="m-0 p-3">*หมายเหตุ</span> <i class="fas fa-square-full border border-secondary" style="color:#c1d9ff;border"></i> คำตอบเป็นข้อความ <i class="fas fa-square-full border border-secondary" style="color:#c6ffc1"></i> คำตอบเป็นภาพ <i class="fas fa-square-full border border-secondary" style="color:#ffc1c1"></i> คำตอบเป็นเสียง</p>

                  </div>
                </div>
              </div>
              <!-- ปุ่มเพิ่มข้อมุล -->
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-success btn-sm" onclick="add_quiz_to_lesson()">เพิ่ม quiz ในบทเรียนนี้</button>
                  </div>
                </div>
                <br>
                <div class="table-responsive">
                  <table id="zero_config" class="table table-bordered table-sm table-hover">
                    <thead class="table-secondary">

                      <tr>
                        <th align="center"><b>ลำดับ</b></th>
                        <th><b>หัวข้อคำถาม</b></th>
                        <th><b>รูปแบบคำตอบ</b></th>
                        <th align="center"><b>ตัวเลือก</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        $style_ans = $result['answer_style'];
                        if ($style_ans == 0) {
                          $ans = 'คำตอบเป็นข้อความ';
                          $color = '#c1d9ff';
                        } elseif ($style_ans == 1) {
                          $ans = 'คำตอบเป็นภาพ';
                          $color = '#c6ffc1';
                        } elseif ($style_ans == 2) {
                          $ans = 'คำตอบเป็นเสียง';
                          $color = '#ffc1c1';
                        }
                        ?>
                        <tr style="background-color:<?= $color ?>">
                          <td align="center"><?= number_format($i); ?></td>
                          <td><?= $result['question_title']; ?></td>
                          <td><?= $ans ?></td>
                          <td align="center">
                            <a href="#" style="color: gray;" title="view" class="view_dataquiz" id="<?php echo $result["quiz_id"]; ?>"><i class="fas fa-search"></i></a>
                            <!-- <a href="#"title="view" class="edit_quiz" id="<?php echo $result["quiz_id"]; ?>" style="color: green;" title="แก้ไขข้อมูล"><i class="far fa-edit"></i></a> -->
                            <a href="#" style="color: green;" class="edit_dataquiz" id="<?php echo $result["quiz_id"]; ?>"><i class="far fa-edit" title="แก้ไข Quiz"></i></a>
                            <i class="fas fa-times-circle" style="color: red;"></i>
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

              <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->
              <div class="modal fade" id="dataModalquiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
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
                      <div class="text-left">
                        <div id="showprocessQuiz_script">
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
              <div class="modal fade" id="dataModalEditQuiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead" id="myModalLabel">แก้ไข Quiz</p>

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
                              <div class="form-group">
                                <label for="">บทเรียน lesson : </label>
                                <input type="text" id="lesson" name="lesson" class="form-control input-lg" placeholder="บทเรียน lesson" value="" required>
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
                                <input type="text" id="quizsound" name="quizsound" class="form-control input-lg" placeholder="quizsound" value="">
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
  <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

  <!-- End Wrapper -->
  <!-- All Jquery -->
  <script>
    /* Basic Table */
    $('#zero_config').DataTable();
    function add_quiz_to_lesson(){
      document.location.href = "form-add-quiz.php?lesson_id=<?php echo $lesson_id ;?>";
    }
  </script>
  <script type="text/javascript">
    $(document).on('click', '.view_dataquiz', function() {
      var quiz_id = $(this).attr("id");
      if (quiz_id != '') {
        $.ajax({
          url: "script/showprocessQuiz_script.php",
          method: "POST",
          data: {
            id: quiz_id
          },
          success: function(data) {
            $('#showprocessQuiz_script').html(data);
            $('#dataModalquiz').modal('show');
          }
        });
      }
    });
    $(document).on('click', '.edit_dataquiz', function() {
      var quiz_id = $(this).attr("id");
      if (quiz_id != '') {
        $.ajax({
          url: "script/editprocessQuiz_script.php",
          method: "POST",
          data: {
            id: quiz_id
          },
          success: function(data) {
            $('#showprocessQuiz_script').html(data);
            $('#dataModalquiz').modal('show');
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