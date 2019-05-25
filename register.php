
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
	<?php include 'template/Nav.php'; ?>
	<!-- end header -->
    <section id="content">
  	<div class="container">

					<div class="row">
						<div class="col-lg-2">

						</div>
						<div class="col-lg-8">
							<h3>กรุณากรอกข้อมูลเพื่อลงทะเบียนเข้าใช้ระบบ</h3>
					  <hr>
						          <form class="register-form" action="register2.php" onsubmit="return checkOK(this);" method="post">
									<div class="form-group">
									  <label for="exampleInputPassword1">ชื่อ login </label>
									 <input type="text"  id="user_name" name="user_name_register" class="form-control input-lg" placeholder="ชื่อ login" onchange="checkUser();" required>
									 <span id="txtCheck"></span>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">รหัสผ่าน</label>
									 <input type="password"  id="user_pwd" name="user_pwd_register" class="form-control input-lg" placeholder="รหัสผ่าน" onchange="checkPass();" required>
									 <span id="txtCheck2"></span>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">ยืนยันรหัสผ่าน</label>
									 <input type="password"  id="user_pwd2" name="user_pwd_register2" class="form-control input-lg" placeholder="ยืนยันรหัสผ่าน" onchange="checkPass2();" required>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">ชื่อ - สกุล </label>
									 <input type="text"  name="user_fullname" class="form-control input-lg" placeholder="ชื่อ - สกุล" required>
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
									 <input type="text"  name="user_school" class="form-control input-lg" placeholder="ชื่อโรงเรียน" required>
								   </div>
									<div class="form-group">
									  <label for="exampleInputPassword1">E-mail </label>
									 <input type="email"  name="user_email" class="form-control input-lg" placeholder="E-mail address" required>
								   </div>
									<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
									<button type="reset" onclick="clearThing();" class="btn btn-danger">ยกเลิก</button>
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
function clearThing() {
	document.getElementById("txtCheck").innerHTML = "";
	document.getElementById("txtCheck2").innerHTML = "";
}

function checkOK(form) {

	str1 = document.getElementById("txtCheck").innerHTML;
	str2 = document.getElementById("txtCheck2").innerHTML;

	if (str1.length > 0)  {
		document.getElementById("user_name").focus();
		return false;
	} else if (str2.length > 0)  {
		document.getElementById("user_pwd").focus();
		return false;
	} else {
		checkPass();
		str2 = document.getElementById("txtCheck2").innerHTML;
		if (str2.length > 0)  {
			document.getElementById("user_pwd").focus();
			return false;
		}
		checkPass2();
		str2 = document.getElementById("txtCheck2").innerHTML;
		if (str2.length > 0)  {
			document.getElementById("user_pwd").focus();
			return false;
		}
	}

	return true;
}

function checkPass() {

	str1 = document.getElementById("user_pwd").value;

	if (str1.length < 8) {
		document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร</span>";
		document.getElementById("user_pwd").focus();
	} else {
		document.getElementById("txtCheck2").innerHTML = "";
	}
}

function checkPass2() {

	str1 = document.getElementById("user_pwd").value;
	str2 = document.getElementById("user_pwd2").value;

	if (str1 == str2) {
		document.getElementById("txtCheck2").innerHTML = "";
	} else {
		document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่าน 2 อันไม่ตรงกัน</span>";
		document.getElementById("user_pwd2").focus();
	}
}

</script>

<script>
function checkUser() {

	 str = document.getElementById("user_name").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if (this.responseText == "0")
				{
					//Do nothing
					document.getElementById("txtCheck").innerHTML = "";
					//return true;
				} else {

					document.getElementById("txtCheck").innerHTML = "<span style='color:red'>ชื่อ login นี้มีผู้ใช้งานแล้ว</span>";
					document.getElementById("user_name").focus();
					//return false;
				}
				
            }
        }
        xmlhttp.open("GET", "getuser.php?q="+str, true);
        xmlhttp.send();

}
</script>

</body>
</html>
