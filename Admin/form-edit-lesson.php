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
        <?php include 'template/menu.php';?>
        <!-- End Topbar header -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เพิ่มบทเรียนและคำศัพท์</h4>
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
                    <h4 class="card-title">เพิ่มบทเรียน</h4>
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
                            <h4 class="card-title">เพิ่มหน้าที่แสดงและคำศัพท์</h4>
                            
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
                                        <div  class="card-body" style="background-color: #ffffcc;">
                                            <p>เพิ่มคำศัพท์ในหน้าที่ 1</p>
                                            <a href="#" ><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> เพิ่มคำศัพท์</a>
                                            <!-- คำศัพท์ คำแรก -->
                                            <hr>
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
                                        </div>
                                        
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
                                <button type="button" class="btn btn-primary btn-sm" ><i class="fas fa-check"> บันทึกข้อมูล</i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick='window.history.back()'><i class="far fa-times-circle"> ยกเลิก</i></button>
                            </div>
                        </div>
                    </form>
                </div>
              <!-- End form add lesson -->
                        
                
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