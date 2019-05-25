<?php
session_start();
include '../db_connection.php';
if ($_SESSION["loggedin"] != True) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- jquery link use for responce form add lesson and word -->

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
            <h4 class="page-title">เพิ่มแบบทดสอบ</h4>
            <div class="ml-auto text-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">เพิ่มแบบทดสอบ</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- Container fluid  -->
      <div class="container-fluid">
        <!-- Form for add lesson -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">เพิ่มข้อมูลแบบทดสอบ</h4>
            <br>
            <!-- form first -->
            <form>
              <div class="row">
                <div class="col-sm-2">
                  <!-- <input id="butt" type="button" value="Test" /> -->
                </div>
                <div class="col-sm-8">
                  

                  <div id="clonedInput1" class="clonedInput">

                    
                    <div class="accordion" id="accordionExample" >
                      <div class="card m-b-0">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                              <span>ข้อที่ 1</span>
                            </a>
                          </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" >
                          <div class="card-body">

                            <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">บทเรียน</label>
                              <div class="col-sm-9">
                                <input type="text" id="lesson_id" name="lesson_id" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">หัวข้อคำถาม</label>
                              <div class="col-sm-9">
                                <input type="text" name="quiz_title" class="form-control" id="quiz_title" placeholder="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">รูปแบบของแบบทดสอบ</label>
                              <div class="col-sm-9">
                                <select class="select2 form-control custom-select" name="quiz_style" id="quiz_style" style="width: 100%; height:36px;" required>
                                  <option value="">-เลือกรูปแบบ-</option>
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                </select>
                              </div>
                            </div>

                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                            <div id="formbox1">
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                  <input type="file" name="quiz_img" id="quiz_img" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">เสียง</label>
                                <div class="col-sm-9">
                                  <input type="text" name="quiz_sound" id="quiz_sound" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_a" id="ans_a" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label">B.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_b" id="ans_b" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label">C.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_c" id="ans_c" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก D.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_d" id="ans_d" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label">E.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_e" id="ans_e" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                <div class="col-sm-2">
                                  <input type="text" name="Ans" id="Ans" class="form-control">
                                </div>
                              </div>
                            </div>
                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->

                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->
                            <div id="formbox2">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                  <input type="file" name="quiz_img" id="quiz_img" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">เสียง</label>
                                <div class="col-sm-9">
                                  <input type="text" name="quiz_sound" id="quiz_sound" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก  A.</label>
                                <div class="col-sm-9">
                                  <input type="file" name="ans_a" class="form-control" id="ans1_a" placeholder="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">B.</label>
                                <div class="col-sm-9">
                                  <input type="file" name="ans_b" class="form-control" id="ans1_b" placeholder="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">C.</label>
                                <div class="col-sm-9">
                                  <input type="file" name="ans_c" class="form-control" id="ans1_c" placeholder="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">D.</label>
                                <div class="col-sm-9">
                                  <input type="file" name="ans_d" class="form-control" id="ans1_d" placeholder="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">E.</label>
                                <div class="col-sm-9">
                                  <input type="file" name="ans_e" class="form-control" id="ans1_e" placeholder="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                <div class="col-sm-4">
                                  <input type="text" name="ANS" class="form-control" id="ans1" placeholder="">
                                </div>
                              </div>
                            </div>
                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->

                           <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                           <div id="formbox3">
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                  <input type="file" name="quiz_img" id="quiz_img" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">เสียง</label>
                                <div class="col-sm-9">
                                  <input type="text" name="quiz_sound" id="quiz_sound" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_a" id="ans_a" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label">B.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_b" id="ans_b" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label">C.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_c" id="ans_c" class="form-control">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก D.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_d" id="ans_d" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label">E.</label>
                                <div class="col-sm-2">
                                  <input type="text" name="ans_e" id="ans_e" class="form-control">
                                </div>
                                <label for="" class="col-sm-1 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                <div class="col-sm-2">
                                  <input type="text" name="Ans" id="Ans" class="form-control">
                                </div>
                              </div>
                            </div>
                            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                            

                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- ปุ่ม clone -->
                    <div class="actions">
                      <button class="clone btn btn-success btn-sm">เพิ่มข้อต่อไป</button>
                      <button class="remove btn btn-danger btn-sm">ลบออก</button>
                    </div>
                    <!-- ปุ่ม clone -->
                    <br>
                  </div>

                  <div id="add_show"></div>

                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                  <button type="submit" id="btn_lesson" class="btn btn-primary btn-sm"><i class="fas fa-check"> บันทึกข้อมูล</i></button>
                  <button type="button" class="btn btn-danger btn-sm" onclick='window.history.back()'><i class="far fa-times-circle"> ยกเลิก</i></button>
                </div>
              </div>
            </form>
            <!-- end form first -->
          </div>
        </div>
        <!-- End form add lesson -->

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script type="text/javascript">
   var $ = jQuery;
    $(document).ready(function() {
      $("#formbox1").hide();
      $("#formbox2").hide();
      $("#formbox3").hide();

      $("#quiz_style").change(function() {
        var quiz_style = $("#quiz_style").val();
        if (quiz_style == 0) {
          $("#formbox1").show();
          $("#quiz_img").val("").focus();
        } else {
          $("#formbox1").hide();
          $("#txt_box").val("");
        }

        if (quiz_style == 1) {
          $("#formbox2").show();
          $("#quiz_img").val("").focus();
        } else {
          $("#formbox2").hide();
          $("#txt_box").val("");
        }

        if (quiz_style == 2) {
          $("#formbox3").show();
          $("#quiz_img").val("").focus();
        } else {
          $("#formbox3").hide();
          $("#txt_box").val("");
        }
        
      });
    });
  </script>
  <script>
    var regex = /^(.+?)(\d+)$/i;
    var cloneIndex = $(".clonedInput").length;
    var $ = jQuery;
    function clone() {
      $(this).parents(".clonedInput").clone()
        .appendTo("#add_show")
        .attr("id", "clonedInput" + cloneIndex)
        .find("*")
        .each(function() {
          var id = this.id || "";
          var match = id.match(regex) || [];
          if (match.length == 3) {
            this.id = match[1] + (cloneIndex);
          }
        })
        .on('click', 'button.clone', clone)
        .on('click', 'button.remove', remove);
      cloneIndex++;
    }

    function remove() {
      $(this).parents(".clonedInput").remove();
    }
    $("button.clone").on("click", clone);

    $("button.remove").on("click", remove);
  </script>
  

</body>

</html>