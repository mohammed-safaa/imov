<?php

include_once '../inc/dbconnected.php';

$sql = "SELECT * FROM `license` ORDER BY id_license DESC LIMIT 1";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$days = $row['days'];
$date_license = date_create($row['data_time']);
$date_star = date_format($date_license,"d-m-Y");
$datetime1 = new DateTime($date_star); // star
$datetime2 = new DateTime($data); // end
$interval = $datetime1->diff($datetime2);
$interval->format('%R%a');
$totil = $interval->format('%R%a');
$nolic = 'License expiration';
if($days >= $totil & $totil >= 0) {
    header("Content-Type: application/json; charset=UTF-8");
   
    $obj = json_decode($_POST["x"], false);
    $stmt = $conn->prepare("SELECT movies.* , users.* FROM movies INNER JOIN users ON movies.userid = users.id ORDER BY `movies`.`mov_id` DESC ");
    $stmt->bind_param($obj->table, $obj->limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
}else{

    echo json_encode($nolic);
}


?>
