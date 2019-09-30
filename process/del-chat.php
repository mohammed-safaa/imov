<?php
include '../inc/dbconnected.php';
$fd = $_GET['udel'];
$sql="DELETE FROM `massges` WHERE `massges`.`id_massges` = $fd ";
mysqli_query($conn,$sql);


?>