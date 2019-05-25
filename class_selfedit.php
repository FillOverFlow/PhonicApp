<?php
session_start();

	if(isset($_SESSION["user_name"])) {

		if (strlen($_SESSION["user_name"]) == 0) {
			$_SESSION["user_status"] = "กรุณา login เข้าสู่ระบบ";
			header("Location: index.php");
			exit;
		}

	} else {
		$_SESSION["user_status"] = "กรุณา login เข้าสู่ระบบ";
		header("Location: index.php");
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Phonic App by Aj.Aum</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="http://iweb-studio.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
<link href="css/cubeportfolio.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<?php include 'template/NavAdmin.php'; ?>
	<!-- end header -->
    <section id="content">
  	<div class="container">

			<?php 
			$user_name = $_SESSION["user_name"];

			include 'db_connection.php';

			$sql = "SELECT * FROM user_account where user_name = '$user_name'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$user_fullname = $row["user_fullname"]; 
					$user_position = $row["user_position"];
					$user_school = $row["user_school"]; 
					$user_email = $row["user_email"];
				}
			}
			$conn->close();
			?>

					<div class="row">
						<div class="col-lg-2">

						</div>
						<div class="col-lg-8">
							<h3>ข้อมูลส่วนตัว</h3>
					  <hr>
						          <form class="register-form" action="class_selfedit2.php" method="post">
									<div class="form-group">
									  <label for="exampleInputPassword1">ชื่อ - สกุล </label>
									 <input type="text"  name="user_fullname" class="form-control input-lg" placeholder="ชื่อ - สกุล" value="<?php echo $user_fullname; ?>" required>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">ตำแหน่ง </label>
									  <select id="user_position" name="user_position" class="form-control input-lg"  required>
									      <option value=""></option>
										  <option value="นักเรียน">นักเรียน</option>
										  <option value="ครู">ครู</option>
										  <option value="อาจารย์">อาจารย์</option>
										  <option value="ผู้ปกครอง">ผู้ปกครอง</option>
										</select>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">ชื่อโรงเรียน </label>
									 <input type="text"  name="user_school" class="form-control input-lg" placeholder="ชื่อโรงเรียน" value="<?php echo $user_school; ?>" required>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">E-mail </label>
									 <input type="email"  name="user_email" class="form-control input-lg" placeholder="E-mail address" value="<?php echo $user_email; ?>" required>
								   </div>
									<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
									<!--button type="reset" class="btn btn-danger">ยกเลิก</button-->
									<a href="class_index.php" class="btn btn-danger ">ยกเลิก</a> 
								</form>
						</div>
						<div class="col-lg-2">

						</div>
					</div>
  	</div>
</section>
	<!-- </section> -->
	
		<!-- footer -->
		<?php include 'template/footer.php'; ?>

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="plugins/flexslider/flexslider.config.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

<script>
document.getElementById("user_position").value = "<?php echo $user_position; ?>";
</script>

</body>
</html>
