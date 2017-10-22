<?php
include("connect.php");
$data = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $id    = $data->id;
    //DELETE FROM table name WHERE column='php variable'
    $query = "DELETE FROM tbl_user WHERE id='$id'";
    if (mysqli_query($connect, $query)) {
        echo 'Data Deleted';
    } else {
        echo 'Error';
    }
}
?>