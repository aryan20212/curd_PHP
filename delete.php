<?php
include "conn.php";
$id = $_GET['id'];
$query = " DELETE FROM `todo_app` WHERE `sno` = $id ";
$result = mysqli_query($con,$query);
// if ($result) {
//     echo "Deleted";
// }
// else{
//     echo "Failed" . mysqli_error($con);
// }
header('location:index.php');
?>