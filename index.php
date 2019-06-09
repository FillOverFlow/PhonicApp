<?php
session_start();
$_SESSION["user_name"] = "";
$_SESSION["user_fullname"] = "";

if(isset($_SESSION["user_status"])) {
	//
} else {
	$_SESSION["user_status"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Phonic App by Aj.Aum</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Phonic App by Aj.Aum" />
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
	<?php include 'template/Nav.php'; ?>
	<!-- end header -->
    <section id="content">
      <div class="container">

		  <div class="row">
			  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" class="register-form" action="class_index.php" method="post">
					<h2>เข้าสู่ระบบ</h2>
					<hr class="colorgraph">

				  <div class="form-group">
					<input type="text" name="user" id="" class="form-control input-lg" placeholder="Username" required>
				  </div>
				  <div class="form-group">
					<input type="password" name="pwd" id="" class="form-control input-lg" placeholder="Password" required>
				  </div>
				  <hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6">
						<input type="submit" value="Login" class="btn btn-theme btn-block btn-lg" tabindex="7">
					<?php
						echo $_SESSION["user_status"];
						$_SESSION["user_status"] = "";
					?>
						</div>
					</div>
				</form>
			</div>
		  </div>

      </div>
      	</section>


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
