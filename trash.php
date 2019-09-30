<?php 
include './inc/function_session.php';
include_once 'inc/dbconnected.php';

	  $editid=$_GET['edit_id'];
	  
	   $sql = "SELECT * FROM `movies` WHERE `mov_id`='$editid'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		
    $file_img = $row['img_name'];
     $file_vid = $row['vid_name'];
     
    $dir = "upload/";
    
    if(file_exists($dir.'/'.$file_img)){
    unlink($dir.'/'.$file_img);
 }
    
  if(file_exists($dir.'/'.$file_vid)){
  unlink($dir.'/'.$file_vid);
 } 
    
mysqli_query($conn,"DELETE FROM movies WHERE mov_id='$editid'");
				
header('location:profile.php');


  
?>