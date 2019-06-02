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
            <form method="post" action="script/addquiz_script.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-2">
                  <!-- <input id="butt" type="button" value="Test" /> -->
                </div>
                <div class="col-sm-8">

                  <div class="card m-b-0">
                     <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                            <span>เลือกบทเรียนที่ต้องการเพิ่ม Quiz</span>
                          </a>
                        </h5>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ระดับ Level</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="level[]" id="level" style="width: 100%; height:36px;" required>
                              <option value="">-เลือก level-</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select>
                          </div>
                      </div>
                      <div class="form-group row"><label for="cono1" class="col-sm-3 text-right control-label col-form-label">บทเรียน lesson</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="lesson_id[]" id="lesson_id" style="width: 100%; height:36px;" required>
                              <option value="">-เลือก บทเรียน-</option>
                            </select>
                          </div>
                      </div>
                    </div>
                  </div>
                 
                  <div id="clonedInput1" class="clonedInput">


                    <div class="accordion" id="accordionExample">
                     <div id="form_quiz"></div>

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
                                <label for="" class="col-sm-1 text-right control-label col-form-label">C.</label>
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
                                <label for="" class="col-sm-1 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
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
                                <label for="" class="col-sm-1 text-right control-label col-form-label">C.</label>
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
                                <label for="" class="col-sm-1 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                <div class="col-sm-2">
                                  <input type="text" name="Ans2[]" id="Ans" class="form-control">
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
                      <!-- <button type="button" class="add_formbox1 btn btn-success btn-sm">Add</button>  -->
                      <button class="create_quiz btn btn-success btn-sm">เพิ่มข้อต่อไป</button>
                      <!-- <button class="remove btn btn-danger btn-sm">ลบออก</button> -->
                    </div>
                    <!-- ปุ่ม clone -->

                    <br>
                  </div>
                  <div id="locate"></div>
                  <div id="add_show"></div>
                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                  <button type="submit" id="btn_lesson" class="btn btn-primary btn-sm"><i class="fas fa-check"> บันทึกข้อมูล</i></button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="gohome()"><i class="far fa-times-circle"> ยกเลิก</i></button>
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
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->

  <script>
    function gohome() {
      document.location.href = 'ManageQuiz.php';
    }
  </script>
  <script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function() {
      $("#formbox1").hide();
      $("#formbox2").hide();
      $("#formbox3").hide();

      //$("#quiz_style1").change(function() {
        
        // var quiz_style = $("#quiz_style").val();
        // if (quiz_style == 0) {
        //   $("#formbox1").show();
        //   //$("#quiz_img").val("").focus();
        // } else {
        //   $("#formbox1").hide();
        //   $("#txt_box").val("");
        // }

        // if (quiz_style == 1) {
        //   $("#formbox2").show();
        //   //$("#quiz_img").val("").focus();
        // } else {
        //   $("#formbox2").hide();
        //   $("#txt_box").val("");
        // }

        // if (quiz_style == 2) {
        //   $("#formbox3").show();
        //   //$("#quiz_img").val("").focus();
        // } else {
        //   $("#formbox3").hide();
        //   $("#txt_box").val("");
        // }

        // if (quiz_style == "") {
        //   $("#formbox1").hide();
        //   $("#formbox2").hide();
        //   $("#formbox3").hide();
        //   //$("#quiz_img").val("").focus();
        // }

      //});
    });
  </script>
  <script>
    var regex = /^(.+?)(\d+)$/i;
    var cloneIndex = $(".clonedInput").length;
    var $ = jQuery;
    var number_quiz = 1;

    function makeid(length) {
            //for make page id 
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
    }
    function create_quiz(){
      var id = makeid(4);
      window.value = id;
      console.log(window.value);
      var formquiz = "<div class='card m-b-0'><div class='card-header' id='headingOne'><h5 class='mb-0'><a data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'><i class='m-r-5 fa fa-magnet' aria-hidden='true'></i><span>ข้อที่ "+number_quiz+"</span></a></h5></div><div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'><div class='card-body'><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>หัวข้อคำถาม</label><div class='col-sm-9'><input type='text' name='quiz_title[]' class='form-control' id='quiz_title' placeholder=''></div></div><div class='form-group row'><label for='' class='col-sm-3 text-right control-label col-form-label'>รูปภาพ</label><div class='col-sm-9'><input type='file' name='quiz_img[]' id='quiz_img' class='form-control'></div></div><div class='form-group row'><label for='' class='col-sm-3 text-right control-label col-form-label'>เสียง</label><div class='col-sm-9'><input type='text' name='quiz_sound[]' id='quiz_sound' class='form-control'></div></div><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>รูปแบบของคำตอบ</label><div class='col-sm-9'><select class='select2 form-control custom-select quiz_style'  name='quiz_style[]' id='quiz_style' style='width: 100%; height:36px;' required><option value=''>-เลือกรูปแบบ-</option><option value='0'>คำตอบเป็นข้อความ</option><option value='1'>คำตอบเป็นภาพ</option><option value='2'>คำตอบเป็นเสียง</option></select></div></div><div id=form_answer"+window.value+"></div>";
        $("#form_quiz").append(formquiz);
        number_quiz++;
    }
    function add_formbox1(){
      var formbox1 = "<div id='formbox1' class='formbox"+window.value+"'><div class='form-group row'><label for='' class='col-sm-3 text-right control-label col-form-label'>ตัวเลือก A.</label><div class='col-sm-2'><input type='text' name='ans_a[]' id='ans_a' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label'>B.</label><div class='col-sm-2'><input type='text' name='ans_b[]' id='ans_b' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label'>C.</label><div class='col-sm-2'><input type='text' name='ans_c[]' id='ans_c' class='form-control'></div></div><div class='form-group row'><label for='' class='col-sm-3 text-right control-label col-form-label'>ตัวเลือก D.</label><div class='col-sm-2'><input type='text' name='ans_d[]' id='ans_d' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label'>E.</label><div class='col-sm-2'><input type='text' name='ans_e[]' id='ans_e' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label' style='color:red;'><b>Ans</b></label><div class='col-sm-2'><input type='text' name='Ans[]' id='Ans' class='form-control'></div></div></div>";
        $("#form_answer"+window.value).append(formbox1);
    }
    function add_formbox2(){
      var formbox2 = "<div id='formbox2' class='formbox"+window.value+"'><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>ตัวเลือก A.</label><div class='col-sm-9'><input type='file' name='ans_a[]' class='form-control' id='ans1_a' placeholder=''></div></div><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>B.</label><div class='col-sm-9'><input type='file' name='ans_b[]' class='form-control' id='ans1_b' placeholder=''></div></div><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>C.</label><div class='col-sm-9'><input type='file' name='ans_c[]' class='form-control' id='ans1_c' placeholder=''></div></div><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>D.</label><div class='col-sm-9'><input type='file' name='ans_d[]' class='form-control' id='ans1_d' placeholder=''></div></div><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label'>E.</label><div class='col-sm-9'><input type='file' name='ans_e[]' class='form-control' id='ans1_e' placeholder=''></div></div><div class='form-group row'><label for='cono1' class='col-sm-3 text-right control-label col-form-label' style='color:red;'><b>Ans</b></label><div class='col-sm-4'><input type='text' name='Ans1[]' class='form-control' id='ans' placeholder=''></div></div></div>"
        $("#form_answer"+window.value).append(formbox2);
    }
    function add_formbox3(){
      var formbox3 = "<div id='formbox3' class='formbox"+window.value+"'><div class='form-group row'><label for='' class='col-sm-3 text-right control-label col-form-label'>ตัวเลือก A.</label><div class='col-sm-2'><input type='text' name='ans_a2[]' id='ans_a' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label'>B.</label><div class='col-sm-2'><input type='text' name='ans_b2[]' id='ans_b' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label'>C.</label><div class='col-sm-2'><input type='text' name='ans_c2[]' id='ans_c' class='form-control'></div></div><div class='form-group row'><label for='' class='col-sm-3 text-right control-label col-form-label'>ตัวเลือก D.</label><div class='col-sm-2'><input type='text' name='ans_d2[]' id='ans_d' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label'>E.</label><div class='col-sm-2'><input type='text' name='ans_e2[]' id='ans_e' class='form-control'></div><label for='' class='col-sm-1 text-right control-label col-form-label' style='color:red;'><b>Ans</b></label><div class='col-sm-2'><input type='text' name='Ans2[]' id='Ans' class='form-control'></div></div></div>"
        $("#form_answer"+window.value).append(formbox3);
    }

    function clone() {
      var id = makeid(4);
      window.value = id;
      var form_answer = "<div id=form_answer"+window.value+"></div>";
      console.log("have form_answer:"+form_answer);
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
          if(id == "quiz_style"){
            console.log("found quiz_style");
            $("locate").append(form_answer);
          }
         
        })
        .on('click', 'button.clone', clone)
        .on('click', 'button.remove', remove);
      cloneIndex++;
      $('#add_show').append(form_answer);
    }

    function remove() {
      console.log('remove');
      $("#form_answer"+window.value).remove('.formbox1');
    }
    $("button.add_formbox1").on("click",add_formbox1);
    $("button.create_quiz").on("click", create_quiz);
    $("button.remove").on("click", remove);

    /*code for search level and lesson*/
    $("#level").change(function(){  //
        $.ajax({
          url: "ajax/lesson_by_level_ajax.php", //ทำงานกับไฟล์นี้
          data: "level_id=" + $("#level").val(),  //ส่งตัวแปร
          type: "POST",
          async:false,
          success: function(data, status) {
          $("#lesson_id").html(data);
           
        },
        
          error: function(xhr, status, exception) { alert(status); }
        
          });
        //return flag;
    });
    /* code change answer style */
    $(document).on('change','.quiz_style',function(){
      var quiz_style = $("#quiz_style").val();
      if(quiz_style == 0){
        $('.formbox'+window.value).remove();
        add_formbox1();
      }
      if(quiz_style == 1){
        $('.formbox'+window.value).remove();
        add_formbox2();
      }
      if(quiz_style == 2){
        $('.formbox'+window.value).remove();
        add_formbox3();
      }
     
    });
   


  </script>




</body>

</html>