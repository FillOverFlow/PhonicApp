<?php // ไฟล์แสดงข้อมูลของผู้ใช้งาน ผ่าน modal

include '../../db_connection.php';  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$lesson_id = $_POST["id"];

$sql = "SELECT * FROM word_detail WHERE lesson_id = '$lesson_id' ORDER BY page_no ASC ";
$query = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
// $row = mysqli_fetch_array($result);

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
          <th><b>บทเรียน</b></th>
          <th><b>คำศัพท์</b></th>
          <th><b>ออกเสียง</b></th>
          <th align="center"><b>รูปคำศัพท์</b></th>
          <th><b>ลบคำศัพท์</b></th>
        </tr>
      </thead>

      <tbody>
        <?php
        $i = 1;
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
          ?>
          <tr>
            <td align="center"><?= number_format($i); ?></td>
            <td><?= $result['lesson_id']; ?></td>
            <td><?= $result['word_show']; ?></td>
            <td><?= $result['word_speak']; ?></td>
            <td align="center"><img src="../<?= $result['word_image']; ?>" alt="รูปคำศัพท์" height="30" width="70"></td>
            <td><a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')==true){window.location='script/delword_script.php?word_id=<?php echo $result["word_id"]; ?>';}" style="color: red;" title="ลบข้อมูล"><i class="fas fa-times-circle"></i></a></td>
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
  <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
  <script>
    /* Basic Table */
    $('#zero1_config').DataTable();
  </script>


</body>

</html>