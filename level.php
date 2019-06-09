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

	$c = 1;
	if(isset($_GET["c"])) {
		$c = $_GET["c"];
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

		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">Level <?php echo $c; ?></h4>

						<div id="sb-search" class="sb-search" style="visibility: hidden;">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							</form>
						</div>
				
				<div id="grid-container" class="cbp-l-grid-projects">
					<ul>

					<?php 

					include 'db_connection.php';

					$sql = "SELECT * FROM lesson_detail where level = '$c' order by lesson_no";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
					?>

						<li class="cbp-item graphic">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<a href="<?php echo $row["big_image"];?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?php echo $row["lesson_name"];?>">
									<img src="<?php echo $row["small_image"];?>" alt="" /></a>
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<!--a href="<?php echo $row["big_image"];?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?php echo $row["lesson_name"];?>">ดูรูปตัวอย่าง</a-->
											<a href="lesson_video.php?lesson_id=<?php echo $row["lesson_id"];?>" class="cbp-l-caption-buttonRight">เข้าเรียน</a>
											<a href="quiz_show.php?lesson_id=<?php echo $row["lesson_id"];?>" class="cbp-l-caption-buttonRight">แบบทดสอบ</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-l-grid-projects-title"><?php echo $row["lesson_name"];?></div>
							<div class="cbp-l-grid-projects-desc"><?php echo $row["lesson_desc"];?></div>
						</li>
					<?php
						}
					}
					$conn->close();
					?>

				</ul>
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