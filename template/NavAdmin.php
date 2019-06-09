    <header>

          <div class="navbar navbar-default navbar-static-top">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="class_index.php"><img src="img/logo.png" alt="" width="270" height="52" /></a>
                  </div>
                  <div class="navbar-collapse collapse ">
                      <ul class="nav navbar-nav">
                          <li class="dropdown ">
                          <a href="class_index.php" >หน้าแรก </a>
                          </li>
                          <li class="dropdown">
                          <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">เนื้อหา <i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu">
                                  <li><a href="level.php?c=1">Level 1</a></li>
                                  <li><a href="level.php?c=2">Level 2</a></li>
                                  <li><a href="level.php?c=3">Level 3</a></li>
                                  <li><a href="level.php?c=4">Level 4</a></li>
							 </ul>
                          </li>
                          <li class="dropdown ">
						<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"> <span class="glyphicon glyphicon-user"></span> ยินดีต้อนรับ <?php echo $_SESSION["user_fullname"]; ?> <i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu">
                                  <li><a href="class_selfedit.php">แก้ไขข้อมูลส่วนตัว</a></li>
								  <li><a href="class_passedit.php">แก้ไขรหัสผ่าน</a></li>
                                  <li><a href="user_score.php">ดูคะแนนย้อนหลัง</a></li>
								  <li><a href="index.php">ออกจากระบบ</a></li>
							 </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
    </header>