<?php
$q = $_REQUEST["q"];

include '../../db_connection.php';

$sql = "SELECT count(*) as aaa FROM admin_account where admin_username = '$q'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $count = $row["aaa"];
    echo $count;
  }
}
$conn->close();
?>
