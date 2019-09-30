<?php

include '../inc/dbconnected.php';

$comment = strip_tags($_POST['comment']);
$userid = strip_tags($_POST['userid']);
$movid = strip_tags($_POST['movid']);

if(isset($_POST['comment']) && $_POST['comment']  !="" ){
$sql="INSERT INTO `comment` (`comment`, `user_id`, `id_movies`) VALUES ('$comment', '$userid', '$movid');";
 mysqli_query($conn,$sql);
}

?>