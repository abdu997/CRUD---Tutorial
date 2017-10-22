<?php
include("connect.php");
$output = array();
$query  = "SELECT * FROM tbl_user";
//we dont need the count condition for this script because we are selecting all the data from database, you can see the data if you run this scirpt on the browser.
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?> 