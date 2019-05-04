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
			$old_pass = crypt($_POST["old_pass"], 'rl');
			$new_pass = crypt($_POST["new_pass"], 'rl');

			include 'db_connection.php';

			$sql = "UPDATE user_account set user_pwd = '$new_pass' where user_name = '$user_name' and user_pwd = '$old_pass'";
		?>

            <div class="row">
              <div class="col-lg-12">

				<div class="row">
					<div class="col-sm-2 col-md-2 col-lg-2">
						<div class="box">
							<div class="aligncenter">

							</div>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8">
						<div class="box">
								<div class="aligncenter">
								<?php
									if (($conn->query($sql) === TRUE) && ($conn->affected_rows > 0)) {
								?>
									<div class="alert alert-success">แก้ไขรหัสผ่านใหม่เรียบร้อยแล้ว</div>
									  <form class="register-form" action="class_index.php" method="post">
										<button type="submit" class="btn btn-primary">กลับหน้าหลัก</button>
									</form>
								<?php
									} else {
								?>
									<div class="alert alert-danger">รหัสผ่านเดิมไม่ถูกต้อง</div>
									  <form class="register-form" action="class_passedit.php" method="post">
										<button type="submit" class="btn btn-danger">ย้อนกลับ</button>
									</form>
								<?php
									}

								$conn->close();
								?>
								 </div>
						</div>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<div class="box">
							<div class="aligncenter">

							</div>
						</div>
					</div>
				</div>
 
              </div>
            </div>

  	</div>
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


</body>
</html>
