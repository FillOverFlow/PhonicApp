<?php 
    //calculate user_exam_score
    // การผ่านต้องได้มากกว่า ครึ่งของ  คะแนนเต็มออกมา
    include '../../db_connection.php';
    $pass_score = 15/2;
    //level 1 
    $sql_user_pass_le1 = "select user_id from user_exam_score where level = 1 and user_score > '$pass_score'";
    $level1 = mysqli_query($conn,$sql_user_pass_le1);
    $num_userpass_le1 = mysqli_num_rows($level1);
    
    $sql_user_fail_le1 = "select user_id from user_exam_score where level = 1 and user_score < '$pass_score'";
    $level1 = mysqli_query($conn,$sql_user_fail_le1);
    $num_userfail_le1 = mysqli_num_rows($level1);

    //level2 
    $sql_user_pass_le2 = "select user_id from user_exam_score where level = 2 and user_score > '$pass_score'";
    $level2 = mysqli_query($conn,$sql_user_pass_le2);
    $num_userpass_le2 = mysqli_num_rows($level2);
    
    $sql_user_fail_le2 = "select user_id from user_exam_score where level = 2 and user_score < '$pass_score'";
    $level2 = mysqli_query($conn,$sql_user_fail_le2);
    $num_userfail_le2 = mysqli_num_rows($level2);

    //level3 
    $sql_user_pass_le3 = "select user_id from user_exam_score where level = 3 and user_score > '$pass_score'";
    $level3 = mysqli_query($conn,$sql_user_pass_le3);
    $num_userpass_le3 = mysqli_num_rows($level3);
    
    $sql_user_fail_le3 = "select user_id from user_exam_score where level = 3 and user_score < '$pass_score'";
    $level3 = mysqli_query($conn,$sql_user_fail_le3);
    $num_userfail_le3 = mysqli_num_rows($level3);

    //level4
    $sql_user_pass_le4 = "select user_id from user_exam_score where level = 4 and user_score > '$pass_score'";
    $level4 = mysqli_query($conn,$sql_user_pass_le4);
    $num_userpass_le4 = mysqli_num_rows($level4);
    
    $sql_user_fail_le4 = "select user_id from user_exam_score where level = 4 and user_score < '$pass_score'";
    $level4 = mysqli_query($conn,$sql_user_fail_le4);
    $num_userfail_le4 = mysqli_num_rows($level4);

    
?>
<script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "สัดส่วนคะแนนของ Exam"
            },
            subtitles: [{
                //text: "Click Legend to Hide or Unhide Data Series"
            }], 
            axisX: {
                title: "สถิติของผู้ผ่านเกณฑ์และไม่ผ่านของ Exam"
            },
            axisY: {
                title: "ผู้ใช้งานที่ผ่านเกณฑ์",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            axisY2: {
                title: "ผู้ใช้งานที่ไม่ผ่านเกณฑ์",
                titleFontColor: "#C0504E",
                lineColor: "#C0504E",
                labelFontColor: "#C0504E",
                tickColor: "#C0504E"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "ผู้ผ่านเกณฑ์",
                showInLegend: true,      
                yValueFormatString: "#,##0.# คน",
                dataPoints: [
                    { label: "Level 1",  y: <?php echo $num_userpass_le1; ?>},
                    { label: "Level 2",  y: <?php echo $num_userpass_le2; ?> },
                    { label: "Level 3",  y: <?php echo $num_userpass_le3; ?> },
                    { label: "Level 4",  y: <?php echo $num_userpass_le4; ?> }
                 
                ]
            },
            {
                type: "column",
                name: "ผู้ไม่ผ่านเกณฑ์",
                axisYType: "secondary",
                showInLegend: true,
                yValueFormatString: "#,##0.# คน",
                dataPoints: [
                    { label: "Level 1",  y: <?php echo $num_userfail_le1; ?>},
                    { label: "Level 2",  y: <?php echo $num_userfail_le2; ?> },
                    { label: "Level 3",  y: <?php echo $num_userfail_le3; ?> },
                    { label: "Level 4",  y: <?php echo $num_userfail_le4; ?> }
                    
                ]
            }]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

        }
</script>