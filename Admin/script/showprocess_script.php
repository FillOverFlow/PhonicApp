<?php // ไฟล์แสดงข้อมูลของผู้ใช้งาน ผ่าน modal

include '../../db_connection.php';  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$user_id = $_POST["id"];

$sql = "SELECT *,SUBSTR(create_date, 1, 10) AS syear , SUBSTR(create_date, 11, 9) AS smonth  FROM user_account WHERE user_id='$user_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>

<head>
	<title>รายละเอียดของข้อมูล</title>
</head>

<body>
	<div class="col-sm-4">
		<div class="card">
			<div class="card-body">
				<i class="fa fa-user fa-4x mb-3 animated rotateIn"></i>
				<p class="text-warning"><?php echo $row['user_fullname']; ?></p>
			</div>
		</div>
	</div>
	<div class="col-sm-8" align="left">
		<!-- แสดงตารางข้อมูลผู้ใช้งาน -->
		<div class="table-responsive">
			<table class="table table-bordered table-sm">
				<tbody>
					<tr>
						<td><b>ชื่อผู้ใช้งาน</b></td>
						<td><?php echo $row['user_name']; ?></td>
					</tr>
					<tr>
						<td><b>รหัสผ่าน</b></td>
						<td><?php echo $row['user_pwd']; ?></td>
					</tr>
					<tr>
						<td><b>ชื่อ - สกุล</b></td>
						<td><?php echo $row['user_fullname']; ?></td>
					</tr>
					<tr>
						<td><b>ระดับ</b></td>
						<td><?php echo $row['user_position']; ?></td>
					</tr>
					<tr>
						<td><b>สถาบัน</b></td>
						<td><?php echo $row['user_school']; ?></td>
					</tr>
					<tr>
						<td><b>อีเมล์</b></td>
						<td><?php echo $row['user_email']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<table class="table table-borderless table-sm">
			<tbody>
				<td width="80%">
					<p style="font-size: 11px;color: gray;">วันที่อัพเดทข้อมูลล่าสุด <?php echo date("d/m/Y", strtotime($row['syear'])); ?></p>
				</td>
				<td width="20%" align="right"><a href="edituser.php?user_id=<?php echo $row["user_id"]; ?>" style="color: green;" title="แก้ไขข้อมูล"><i class="far fa-edit"></i></a>
				</td>
			</tbody>
		</table>
	</div>


</body>

</html>