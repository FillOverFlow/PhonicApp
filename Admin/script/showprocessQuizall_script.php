<?php
session_start();
include '../../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}
$lesson_id = $_POST["id"];
$sql = "SELECT * FROM quiz_detail WHERE lesson_id = '$lesson_id' ORDER BY create_date";
$query = mysqli_query($conn, $sql);

// echo $lesson_id;
?>
<!DOCTYPE html>
<html>

<head>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <title>รายละเอียดของข้อมูล</title>

</head>

<body>
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero1_config" class="table table-bordered table-sm table-hover">
                <thead>
                    <tr>
                        <th width="15px" align="center"><b>ลำดับ</b></th>
                        <th><b>หัวข้อคำถาม</b></th>
                        <th><b>รูปแบบคำตอบ</b></th>
                        <th><b>ตัวเลือก</b></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        $style_ans = $result['answer_style'];
                        if ($style_ans == 0) {
                            $ans = 'คำตอบเป็นข้อความ';
                        } elseif ($style_ans == 1) {
                            $ans = 'คำตอบเป็นภาพ';
                        } elseif ($style_ans == 2) {
                            $ans = 'คำตอบเป็นเสียง';
                        }
                        ?>
                        <tr>
                            <td align="center"><?= number_format($i); ?></td>
                            <td><?= $result['question_title']; ?></td>
                            <td><?= $ans ?></td>
                            <td width="65px;" align="center">
                                <a href="#" style="color: gray;" title="view" class="view_data" id="<?php echo $result["lesson_id"]; ?>"><i class="fas fa-search"></i></a>
                                <i class="far fa-edit"></i>
                                <i class="fas fa-times-circle"></i>
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

        <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->
        <div class="modal fade" id="dataModalquiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                            <div class="row" id="showprocessQuiz_script">
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


    </div>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /* Basic Table */
        $('#zero_config').DataTable();
    </script>

    <!-- แสดงข้อมูล modal -->
    <script type="text/javascript">
        $(document).on('click', '.view_data', function() {
            var lesson_id = $(this).attr("id");
            if (lesson_id != '') {
                $.ajax({
                    url: "script/showprocessQuiz_script.php",
                    method: "POST",
                    data: {
                        id: lesson_id
                    },
                    success: function(data) {
                        $('#showprocessQuiz_script').html(data);
                        $('#dataModalquiz').modal('show');
                    }
                });
            }
        });
    </script>

</body>

</html>