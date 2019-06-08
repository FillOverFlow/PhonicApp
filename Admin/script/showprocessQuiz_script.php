<?php
session_start();
include '../../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}
$quiz_id = $_POST["id"];
$sql = "SELECT * FROM quiz_detail WHERE quiz_id='$quiz_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>รายละเอียดของข้อมูล</title>
</head>

<body>
    <!-- Section: Blog v.1 -->
    <section class="my-3 m-3">
        <!-- แสดดงข้อมูล quiz 1  -->
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
			<table class="table table-bordered table-sm">
				<tbody>
					<tr>
						<td><b>หัวข้อคำถาม</b></td>
						<td></td>
					</tr>
					<tr>
						<td><b>รูปภาพคำถาม</b></td>
						<td></td>
					</tr>
					<tr>
						<td><b>เสียง</b></td>
						<td></td>
					</tr>
					<tr>
						<td><b>รูปแบบคำถาม</b></td>
						<td></td>
                    </tr>
                    <tr>
						<td><b>ตัวเลือกคำตอบ</b></td>
						<td></td>
                    </tr>
                    <tr>
						<td><b>คำตอบที่ถูกต้อง</b></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
            </div>
        </div>
        </div>
        <!-- แสดดงข้อมูล quiz 1-->
    </section>
</body>

</html>