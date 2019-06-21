<?php
session_start();
include '../db_connection.php';
if($_SESSION["loggedin"]!=True){
    //if not login redirect to login.php 
    header("location:login.php");
}
$lesson_id = $_GET["lesson_id"];
$sql = "SELECT * FROM word_detail WHERE lesson_id = '$lesson_id' ORDER BY page_no ASC ";
$query = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
// $row = mysqli_fetch_array($result);

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
                    <div class="card-body">
                        <div class="table-responsive">
                           <table id="zero1_config" class="table table-bordered table-sm table-hover">
                              <thead>
                                <tr>
                                  <th width="15px" align="center"><b>ลำดับ</b></th>
                                  <th width="85" align="center"><b>บทเรียน</b></th>
                                  <th><b>คำศัพท์</b></th>
                                  <th><b>ออกเสียง</b></th>
                                  <th align="center" ><b>รูปคำศัพท์</b></th>
                                  <th><b>ตัวเลือก</b></th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php
                                $i = 1;
                                while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                  ?>
                                  <tr>
                                    <td align="center"><?= number_format($i); ?></td>
                                    <td align="center"><?= $result['lesson_id']; ?></td>
                                    <td><?= $result['word_show']; ?></td>
                                    <td><?= $result['word_speak']; ?></td>
                                    <td align="center" width="100"><img src="../<?= $result['word_image']; ?>" alt="รูปคำศัพท์" height="30" width="70"></td>
                                    <td width="70" align="center">
                                       <a href="#" style="color: green;" class="edit_word" id="<?php echo $result["word_id"]; ?>"><i class="far fa-edit" title="แก้ไข Word"></i></a>
                                      <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')==true){window.location='script/delword_script.php?word_id=<?php echo $result["word_id"]; ?>';}" style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a>
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
                <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->
              <div class="modal fade" id="dataModalword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <div  id="showprocessWord_script">
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
              <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน --
                <!-- Sales chart -->
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
    <script>
    /* Basic Table */
    $('#zero1_config').DataTable();
  </script>
  <script type="text/javascript">
    $(document).on('click', '.edit_word', function() {
      var quiz_id = $(this).attr("id");
      if (quiz_id != '') {
        $.ajax({
          url: "script/editprocessWord_script.php",
          method: "POST",
          data: {
            id: quiz_id
          },
          success: function(data) {
            $('#showprocessWord_script').html(data);
            $('#dataModalword').modal('show');
          }
        });
      }
    });
  </script>

</body>

</html>