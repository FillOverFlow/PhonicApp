<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<!-- jquery link use for responce form add lesson and word -->

    <title>Administrator Phonic App by Aj.Aum</title>
    <!-- css for button_addword -->
    <style type="text/css">
        .button {
          background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
        .button_addword{
            background-color: white;
            color:black;
            border:2px solid #555555;

        }
        .button_showimg{
            
            color:black;
            border:2px solid #555555;
            background-size: 65px;
            width: 85px;
            height: 58px;
        }
        /*shadow box*/
        .button:hover{
             box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
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
        <?php include 'template/menu.php';?>
        <!-- End Topbar header -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">แก้ไขบทเรียนและคำศัพท์</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">แก้ไขบทเรียนและคำศัพท์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
              <!-- Example image -->
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">คำอธิบาย</h4>
                      <div class="row">
                          <img src="assets/images/example_picture.jpg" alt="">
                      </div>
                  </div>
              </div>
              <!-- End Example image -->
              <!-- Form for add lesson -->
              <div class="card">
                    <form class="form-horizontal">
                    <div class="card-body">
                    <h4 class="card-title">แก้ไขบทเรียน</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">รูปบทเรียน</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="fname" placeholder="First Name Here">
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">รูปบทเรียนใหญ่</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="lname" placeholder="Last Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">ภาพตัวอย่าง</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="lname" placeholder="Password Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">ชื่อบทเรียน</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email1" placeholder="ตัวอย่าง Lesson 4">
                                </div>
                            </div>
                            <div class="form-group row">
                                 <label for="cono1" class="col-sm-3 text-right control-label col-form-label">คำอธิบายบทเรียน</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cono1" placeholder="ตัวอย่าง Word with Short Vowel ' a '">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h4 class="card-title">แก้ไขหน้าที่แสดงและคำศัพท์</h4>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                <div><a id="btn-page" class="btn btn-success btn-sm" style ="color:#fff"><i class="fas fa-plus-circle"></i> เพิ่มหน้าที่แสดง</a></div>
                                <br>
                                
                                <!-- start form add word  -->
                                <div id="accordion">
                                    <div class="card">
                                    
                                    <div class="card-header  fas fa-book" style="background-color:#ffcc99;">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                        หน้าที่ 1
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse " data-parent="#accordion">
                                        <div>
                                            <div class="col-md-12" style="background-color: #ffffcc;">
                                                  <a href="#" class="button button_addword" data-toggle="modal" data-target="#modal_addword"><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                                                  <button class="button button_showimg" style="background-image: url('assets/images/ant.jpg');"><span><i class="fa fa-pencil"  aria-hidden="true"></i></span></button>
                                            </div>
                                        </div>
                                        <div  class="card-body" style="background-color: #ffffcc;">
                                           
                                        
                                            <!-- <hr>
                                            <p>1</p>
                                            <div class="form-group row">
                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">รูปคำศัพท์</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="cono1" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ชื่อคำศัพท์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="cono1" placeholder="ตัวอย่าง A a">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">เสียงคำศัพท์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="cono1" placeholder="ตัวอย่าง ant">
                                                </div>
                                            </div>
                                            <hr>
                                        </div> -->
                                        
                                        <!-- สิ้นสุดคำศัพท์คำแรก -->
                                    </div>
                                    </div>
                                    <div id="page"></div>
                                  
                                    
                                </div>
                            </div>
                            <!-- end form add word -->
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary btn-sm" ><i class="fas fa-check"> อัพเดทข้อมูล</i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick='window.history.back()'><i class="far fa-times-circle"> ยกเลิก</i></button>
                            </div>
                        </div>
                    </form>
                </div>
              <!-- End form add lesson -->
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
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">รูปคำศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="cono1" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ชื่อคำศัพท์</label>
                                <div class="col-sm-9">
                                     <input type="text" class="form-control" id="cono1" placeholder="ตัวอย่าง A a">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">เสียงคำศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cono1" placeholder="ตัวอย่าง ant">
                                </div>
                        </div>
                        <hr>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">อัพเดทข้อมูล</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
              <!-- end modal -->
                
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script>
         /* Basic Table */
        $('#zero_config').DataTable();
    </script>
    <!-- script for create html by javascript -->
    <script>
        $(document).ready(function(){
           
            $("#btn-page").click(function(){
                $("#page").append("<div class='card'><div class='card-header'><a class='collapsed card-link' data-toggle='collapse' href='#collapseTwo'>หน้าต่อไป</a></div><div id='collapseTwo' class='collapse' data-parent='#accordion'><div class='card-body'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div></div></div>");
            });
        });
        
        
    </script>
    

</body>

</html>