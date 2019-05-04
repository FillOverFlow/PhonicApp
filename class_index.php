<?php
session_start();

include 'db_connection.php';

$count = 0;
if(isset($_POST["user"]))
{
	$user =  $_POST["user"];
	$pwd = crypt($_POST["pwd"], 'rl');

	$sql = "SELECT user_name, user_fullname FROM user_account WHERE user_name = '$user' and user_pwd = '$pwd'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$_SESSION["user_name"] = $row["user_name"];
			$_SESSION["user_fullname"] = $row["user_fullname"];
		}
		$count = 1;
	} else {
		//echo "login fail";
		$_SESSION["user_status"] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
		header("Location: index.php");
		exit;
	}
} else {
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
}
$conn->close();
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
  	
  	<!-- </section> -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
								<a href="level1.php" class="btn btn-warning btn-lg" style='font-size:25px'> Level 1 </a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
								<a href="level2.php" class="btn btn-info btn-lg" style='font-size:25px'> Level 2 </a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
								<a href="level3.php" class="btn btn-danger btn-lg" style='font-size:25px'> Level 3 </a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
								<a href="level4.php" class="btn btn-success btn-lg" style='font-size:25px' > Level 4 </a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>	
	</section>
	<!----->
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
