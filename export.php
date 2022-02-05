<?php
include "conn.php";
$result = mysqli_query($con,'SELECT * FROM `todo_app`');
$num_fields = mysqli_num_fields($result);
$headers = array('Sno','Title','Description');
$fp = fopen('php://output','w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="todo_list.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp,$headers);
    while($row = $result->fetch_array(MYSQLI_NUM)){
        fputcsv($fp,array_values($row));
    }
    die;

}

?>