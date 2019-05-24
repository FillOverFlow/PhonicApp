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
            <div class="row">
              <div class="col-sm-4" align="center">
                <div><a onclick=addpage() class="btn btn-success btn-lg" style="color:#fff;"><i class="fas fa-plus-circle"></i> เพิ่มแบบทดสอบ</a></div>
              </div>
              <div class="col-sm-8">
                <div>
                  <div id="page"></div>
                </div>
              </div>
            </div>

            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 text-right control-label col-form-label">บทเรียน</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="lesson_name" id="lesson_name" placeholder="ตัวอย่าง Lesson 4" required>
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 text-right control-label col-form-label">หัวข้อคำถาม</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="lesson_name" id="lesson_name" placeholder="" required>
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 text-right control-label col-form-label">รูปแบบของแบบทดสอบ</label>
              <div class="col-sm-6">
                <select class="select2 form-control custom-select" name="position" id="position" style="width: 100%; height:36px;" onclick=addpage() required>
                  <option value="">-เลือกรูปแบบ-</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                </select>
              </div>
            </div> -->
            <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
            <!-- <div id="formbox1">
              <div class="form-group row">
                <label for="" class="col-sm-3 text-right control-label col-form-label"></label>
                <div class="col-sm-6">
                  <div class="accordion" name="quiz_img" id="quiz_img" style="border: 1px solid #ECEEED;">
                    <div class="card m-b-0">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor:Pointer;">
                            <i class="m-r-5 fa fa-archive" aria-hidden="true"></i>
                            <span>แบบที่ 1</span>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#quiz_img">
                        <div class="card-body">
                       
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
        </div>
        <!-- End form add lesson -->

      </div>
      <!-- End Container fluid  -->
      <!-- modal addword -->
      <div class="modal fade" id="modal_addword" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">

              <!-- <a href="#" ><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> เพิ่มคำศัพท์</a> -->
              <!-- button add word -->
              <!-- คำศัพท์ คำแรก -->
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
                  <select class="select2 form-control custom-select" name="position" id="position" style="width: 100%; height:36px;" required>
                    <option value="">-เลือกรูปแบบ-</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
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
                <label for="" class="col-sm-12 text-right control-label col-form-label"> ตัวเลือก</label>
                <div class="form-group row">
                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">A.</label>
                  <div class="col-sm-9">
                    <input type="file" name="ans1_a" class="form-control" id="ans1_a" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">B.</label>
                  <div class="col-sm-9">
                    <input type="file" name="ans1_b" class="form-control" id="ans1_b" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">C.</label>
                  <div class="col-sm-9">
                    <input type="file" name="ans1_c" class="form-control" id="ans1_c" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">D.</label>
                  <div class="col-sm-9">
                    <input type="file" name="ans1_d" class="form-control" id="ans1_d" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">E.</label>
                  <div class="col-sm-9">
                    <input type="file" name="ans1_e" class="form-control" id="ans1_e" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                  <div class="col-sm-4">
                    <input type="text" name="ans1" class="form-control" id="ans1" placeholder="">
                  </div>
                </div>
              </div>
              <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->

            </div>
            <div class="modal-footer">

              <button id="but_upload" class="btn btn-success" data-dismiss="modal">บันทึก</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

            </div>

          </div>

        </div>
      </div>
      <!-- end modal -->

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
    $(document).ready(function() {
      $("#formbox1").hide();
      $("#formbox2").hide();

      $("#position").change(function() {
        var position = $("#position").val();
        if (position == 0) {
          $("#formbox1").show();
          $("#quiz_img").val("").focus();
        } else {
          $("#formbox1").hide();
          $("#txt_box").val("");
        }

        if (position == 1) {
          $("#formbox2").show();
          $("#quiz_img").val("").focus();
        } else {
          $("#formbox2").hide();
          $("#txt_box").val("");
        }



      });

    });
  </script>
  <script>
    //init page number 
    var page_number = 0;
    var word_number = 1;
    var lesson_id = makeid(10);

    function makeid(length) {
      //for make page id 
      var result = '';
      var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      var charactersLength = characters.length;
      for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return result;
    }

    function addpage() {
      page_number++;
      word_number = 1;
      //random page id and use to locat page and word
      var page_id = makeid(4);
      var page_markup = "<div  class='accordion' id ='accordion' style='border: 1px solid #ECEEED;'><div class='card'><div class='card-header' id='headingOne'><h5 class='mb-0'><a class='card-link' data-toggle='collapse' href='#" + page_id + "' style='color:black;'><i class='m-r-5 fa fa-archive' aria-hidden='true'></i><span>ข้อที่ " + page_number + "</span></a></h5></div><div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#quiz_img'><div class='card-body'> <div class='row'><div class='col-sm-12'><a href='#' class='button' data-toggle='modal' data-target='#modal_addword'><span><i class='fa fa-plus-circle' aria-hidden='true'></i></span></a></div></div> </div></div></div></div><br>";
      $("#page").append(page_markup);

      window.value = page_id;
    }
  </script>


</body>

</html>