<?php
session_start();
include '../../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}
$quiz_id = $_POST["id"];
$sql = "SELECT * FROM quiz_detail WHERE quiz_id='$quiz_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);

$ans_style = $row["answer_style"];
if ($ans_style == 0) {
    $ans = 'คำตอบเป็นข้อความ';
}
if ($ans_style == 1) {
    $ans = 'คำตอบเป็นภาพ';
}
if ($ans_style == 2) {
    $ans = 'คำตอบเป็นเสียง';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>รายละเอียดของข้อมูล</title>
</head>

<body>
    <!-- แสดดงข้อมูล quiz 0  -->
    <?php if ($ans_style == 0) { ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td width="150px"><b>หัวข้อคำถาม</b></td>
                            <td><?= $row["question_title"]; ?></td>
                        </tr>
                        <?Php if ($row['question_image'] != '') { ?>
                            <tr>
                                <td width="150px"><b>รูปภาพคำถาม</b></td>
                                <td align="center"><img src="../../<?= $row['question_image']; ?>" alt="รูปคำถาม" height="100" width="150"></td>
                            </tr>
                        <?Php } ?>
                        <?Php if ($row['question_sound'] != '') { ?>
                            <tr>
                                <td width="150px"><b>เสียง</b></td>
                                <td><?= $row["question_sound"]; ?></td>
                            </tr>
                        <?Php } ?>
                        <tr>
                            <td width="150px"><b>รูปแบบคำถาม</b></td>
                            <td><?= $ans; ?></td>
                        </tr>
                        <tr>
                            <td width="150px"><b>ตัวเลือกคำตอบ</b></td>
                            <td>
                                <p><b>ข้อ a.</b> <?= $row["answer_a"]; ?></p>
                                <p><b>ข้อ b.</b> <?= $row["answer_b"]; ?></p>
                                <p><b>ข้อ c.</b> <?= $row["answer_c"]; ?></p>
                                <p><b>ข้อ d.</b> <?= $row["answer_d"]; ?></p>
                                <p><b>ข้อ e.</b> <?= $row["answer_e"]; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="150px"><b>คำตอบที่ถูกต้อง</b></td>
                            <td><b>ข้อ. </b><?= $row["answer_key"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
    <!-- แสดดงข้อมูล quiz 1-->
    <?php if ($ans_style == 1) { ?>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td width="150px"><b>หัวข้อคำถาม</b></td>
                            <td><?= $row["question_title"]; ?></td>
                        </tr>
                        <?Php if ($row['question_image'] != '') { ?>
                            <tr>
                                <td width="150px"><b>รูปภาพคำถาม</b></td>
                                <td align="center"><img src="../../<?= $row['question_image']; ?>" alt="รูปคำถาม" height="100" width="150"></td>
                            </tr>
                        <?Php } ?>
                        <?Php if ($row['question_sound'] != '') { ?>
                            <tr>
                                <td width="150px"><b>เสียง</b></td>
                                <td><?= $row["question_sound"]; ?></td>
                            </tr>
                        <?Php } ?>
                        <tr>
                            <td width="150px"><b>รูปแบบคำถาม</b></td>
                            <td><?= $ans; ?></td>
                        </tr>
                        <tr>
                            <td width="150px"><b>ตัวเลือกคำตอบ</b></td>
                            <td>
                                <p><b>ข้อ a.</b> <img src="../../<?= $row['answer_a']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ b.</b> <img src="../../<?= $row['answer_b']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ c.</b> <img src="../../<?= $row['answer_c']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ d.</b> <img src="../../<?= $row['answer_d']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ e.</b> <img src="../../<?= $row['answer_e']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="150px"><b>คำตอบที่ถูกต้อง</b></td>
                            <td><b>ข้อ. </b><?= $row["answer_key"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
    <!-- แสดดงข้อมูล quiz 2-->
    <?php if ($ans_style == 2) { ?>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td width="150px"><b>หัวข้อคำถาม</b></td>
                            <td><?= $row["question_title"]; ?></td>
                        </tr>
                        <?Php if ($row['question_image'] != '') { ?>
                            <tr>
                                <td width="150px"><b>รูปภาพคำถาม</b></td>
                                <td align="center"><img src="../../<?= $row['question_image']; ?>" alt="รูปคำถาม" height="100" width="150"></td>
                            </tr>
                        <?Php } ?>
                        <?Php if ($row['question_sound'] != '') { ?>
                            <tr>
                                <td width="150px"><b>เสียง</b></td>
                                <td><?= $row["question_sound"]; ?></td>
                            </tr>
                        <?Php } ?>
                        <tr>
                            <td width="150px"><b>รูปแบบคำถาม</b></td>
                            <td><?= $ans; ?></td>
                        </tr>
                        <tr>
                            <td width="150px"><b>ตัวเลือกคำตอบ</b></td>
                            <td>
                                <p><b>ข้อ a.</b> <img src="../../<?= $row['answer_a']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ b.</b> <img src="../../<?= $row['answer_b']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ c.</b> <img src="../../<?= $row['answer_c']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ d.</b> <img src="../../<?= $row['answer_d']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                                <p><b>ข้อ e.</b> <img src="../../<?= $row['answer_e']; ?>" alt="รูปคำถาม" height="70" width="70"></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="150px"><b>คำตอบที่ถูกต้อง</b></td>
                            <td><b>ข้อ. </b><?= $row["answer_key"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</body>

</html>