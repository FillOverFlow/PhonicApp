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
<html class="no-js consumer" lang="en">
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

<style>
* {box-sizing: border-box}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height: 400px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 80%;
  border-left: none;
  height: 400px;
}
</style>

</head>
<body>

<div id="wrapper">

	<!-- start header -->
	<?php include 'template/NavAdmin.php'; ?>
	<!-- end header -->
	<section id="content">
	<div class="container">

	<?php 

		include 'db_connection.php';
		$lesson_id = $_GET["lesson_id"];

		$sql = "SELECT * FROM lesson_detail where lesson_id = '$lesson_id' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$level = $row["level"];
				$lesson_name = $row["lesson_name"];
				$lesson_desc = $row["lesson_desc"];
				$youtube =  $row["youtube"];
			}
		}

		$conn->close();
	?>

		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading"><?php echo $lesson_name . ' : ' . $lesson_desc; ?></h4>
			</div>
			<div class="col-lg-12">
					<div class="col-sm-2 col-md-2 col-lg-2">
						<div class="box">
							<div class="aligncenter">
							</div>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8">
						<div class="aligncenter">
							<iframe src="https://www.youtube.com/embed/<?php echo $youtube; ?>" width=560 height=315 frameborder=0 allowfullscreen>
							</iframe>
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

				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-6">
						<div class="box">
							<div class="aligncenter">

								<a href="level.php?c=<?php echo $level;?>" class="btn btn-info btn-lg" style='font-size:15px'>  &lt; Prev </a>
								<a href="lesson_show.php?lesson_id=<?php echo $lesson_id;?>" class="btn btn-danger btn-lg" style='font-size:15px'>  Next &gt;  </a>

							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="box">
							<div class="aligncenter">
							</div>
						</div>
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
<script src="js/responsivevoice.js"></script>

</body>
</html>