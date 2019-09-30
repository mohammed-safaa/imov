<?php
include '../inc/dbconnected.php';

$chat = strip_tags($_POST['massage']);
$sendrid = strip_tags($_POST['senderid']);
$touserid = strip_tags($_POST['touserid']);
$status  = strip_tags($_POST['status']);
//$idjoin  = $_POST['idjoin'];

if($sendrid > $touserid){
    $Join = $touserid.$sendrid;
  }else{
    $Join = $sendrid.$touserid;
  }
  


if(isset($_POST['massage']) && $_POST['massage']  !="" ){
$sql="INSERT INTO `massges` ( `massges`, `sender_id`, `to_user_id`, `status`, `id_join`)
 VALUES ('$chat', '$sendrid', '$touserid', '$status', '$Join')";
 mysqli_query($conn,$sql);
}

?>
