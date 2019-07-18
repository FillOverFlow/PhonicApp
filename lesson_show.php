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
		if(isset($_GET["thispage"])) {
			$thispage =  $_GET["thispage"];
		} else {
			$thispage = 1;
		}

		$sql = "SELECT * FROM lesson_detail where lesson_id = '$lesson_id' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$level = $row["level"];
				$maxpage = $row["maxpage"];
				$lesson_name = $row["lesson_name"];
				$lesson_desc = $row["lesson_desc"];
			}
		}

		//check have quiz in lesson
		$have_quiz = false;
		$sql_check = "SELECT quiz_id from quiz_detail  where lesson_id = '$lesson_id'";
		$check = $conn->query($sql_check);
		$num = mysqli_num_rows($check);
		if($num > 0){
			$have_quiz = true;
		}

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

							<!--div id="info" style="text-align:center;">
							  <p id="info_start">
								Click on the microphone icon and begin speaking or Click on the speaker icon and listening to a word.
							  </p>
							  <p id="info_speak_now" style="display:none">
								Speak now.
							  </p>
							  <p id="info_no_speech" style="display:none">
								No speech was detected. You may need to adjust your <a href=
								"//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">microphone
								settings</a>.
							  </p>
							  <p id="info_no_microphone" style="display:none">
								No microphone was found. Ensure that a microphone is installed and that
								<a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
								microphone settings</a> are configured correctly.
							  </p>
							  <p id="info_allow" style="display:none">
								Click the "Allow" button above to enable your microphone.
							  </p>
							  <p id="info_denied" style="display:none">
								Permission to use microphone was denied.
							  </p>
							  <p id="info_blocked" style="display:none">
								Permission to use microphone is blocked. To change, go to
								chrome://settings/contentExceptions#media-stream
							  </p>
							  <p id="info_upgrade" style="display:none">
								Web Speech API is not supported by this browser. Upgrade to <a href=
								"//www.google.com/chrome">Chrome</a> version 25 or later.
							  </p>
							</div-->

						<div class="box">
							<div class="aligncenter">
								<div class="tab">

								<?php
										$sql = "SELECT * FROM word_detail where lesson_id = '$lesson_id' and page_no = '$thispage' order by word_no";
										$result = $conn->query($sql);
										$first_word = "";
										$first_mic = "";
										$first_span = "";

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {

												if($first_word == "") {
													$first_word = "w" . $row["word_no"];
													$first_mic = "img"  . $row["word_no"];
													$first_span = "span"  . $row["word_no"];
												}
								?>
												<button class="tablinks" onmouseover="openCity('w<?php echo $row["word_no"];?>')" ><?php echo $row["word_show"];?></button>
								<?php
											}
										}
								?>
								</div>

								<?php
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
								?>
											<div id="w<?php echo $row["word_no"];?>" class="tabcontent">
                                                <br>
                                                <br>
												<p><img src="<?php echo $row["word_image"];?>" height="250" width="250"></p>
												 <p>
														<input type="image" onclick="startButton(img<?php echo $row["word_no"];?>, span<?php echo $row["word_no"];?>)" src="img/mic.png" id="img<?php echo $row["word_no"];?>" width="36">
														<input type="image" onclick="responsiveVoice.speak('<?php echo $row["word_speak"];?>','UK English Female');" src="img/speaker.png" width="36">
												  </p>
												  <p>
														<span id="span<?php echo $row["word_no"];?>" style="color:blue"></span>
												  </p>
											</div>
								<?php
											}
										}
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

		<?php
			$conn->close();
		?>
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
							<?php
								if ($thispage == 1) {
							?>
								<a href="lesson_video.php?lesson_id=<?php echo $lesson_id;?>" class="btn btn-info btn-lg" style='font-size:15px'>  &lt; Prev </a>
							<?php
								} else {
							?>
								<a href="lesson_show.php?lesson_id=<?php echo $lesson_id;?>&thispage=<?php echo $thispage - 1;?>" class="btn btn-info btn-lg" style='font-size:15px'>  &lt; Prev </a>
							<?php
								}
							?>&nbsp;&nbsp;&nbsp;
							<?php
								if ($thispage < $maxpage) {
							?>
								<a href="lesson_show.php?lesson_id=<?php echo $lesson_id;?>&thispage=<?php echo $thispage + 1;?>" class="btn btn-danger btn-lg" style='font-size:15px'>  Next &gt;  </a>
							<?php
								} else {
									if($have_quiz == true){
							?>
								<a href="quiz_show.php?lesson_id=<?php echo $lesson_id;?>" class="btn btn-danger btn-lg" style='font-size:15px'>  แบบทดสอบ  </a>
							<?php
									}
								}
							?>
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

<script type="text/javascript">

var recognizing = false;
var first_mic = <?php echo $first_mic;?>;
var first_span = <?php echo $first_span;?>;
var recognition = new webkitSpeechRecognition();

recognition.lang = 'en-GB';
recognition.continuous = true;
reset();
recognition.onend = reset;

    recognition.onresult = function (event) {
      for (var i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
  		  first_span.innerHTML = "You say : ";
          first_span.innerHTML += event.results[i][0].transcript;

        recognition.stop();
        reset();
        }
      }
    }

function reset() {
  recognizing = false;
  first_mic.src = 'img/mic.png';
}

function startButton(img_id, span_id) {

  first_mic = img_id;
  first_span = span_id;

      if (recognizing) {
        recognition.stop();
        reset();
      } else {
        recognition.start();
        recognizing = true;
        first_mic.src = 'img/mic-animate.gif';
      }

}
</script>

<script type="text/javascript">

function openCity(cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  //evt.currentTarget.className += " active";
  document.getElementById(cityName).className += " active";
}

openCity('<?php echo $first_word;?>');

</script>

</body>
</html>
