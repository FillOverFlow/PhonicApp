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
	<?php include 'template/NavAdmin.php'; ?>
	<!-- end header -->
    <section id="content">
  	
  	<!-- </section> -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

			<h3 class="heading">คะแนน Quiz ย้อนหลัง</h4>

				<div class="row">
					<div class="col-sm-2 col-md-2 col-lg-2">

					</div>
					<div class="col-sm-8 col-md-8 col-lg-8">
						<div class="box">
							<div class="aligncenter">
								
							<table class="table table-bordered">
							<thead>
								<tr>
									<th scope="col">Level</th>
									<th scope="col">Lesson</th>
									<th scope="col">คะแนนที่ได้</th>
									<th scope="col">วันที่ทดสอบ</th>

								</tr>
							</thead>
							<tbody>

								<?php 

								include 'db_connection.php';

								$sql = "SELECT ld.level, ld.lesson_name, ld.lesson_desc, uq.user_score, uq.total_score, uq.test_date FROM `user_quiz_score` uq left join lesson_detail ld on uq.lesson_id = ld.lesson_id WHERE uq.user_id = '" . $_SESSION["user_id"] . "' order by ld.level, ld.lesson_no, uq.test_date";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
								?>
										<tr>
											<td><?php echo $row["level"]; ?></td>
											<td><?php echo $row["lesson_name"] . " " . $row["lesson_desc"]; ?></td>
											<td><?php echo $row["user_score"] . " / " . $row["total_score"];?></td>
											<td><?php echo $row["test_date"];?></td>
										</tr>
								<?php
									}
								}
								$conn->close();
								?>

								</tbody>
							</table>
							</div>
						</div>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">

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
