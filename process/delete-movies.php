<?php 
session_start();
//redirect ot login page if not logged in
if(!isset($_SESSION['user'])){
	header('location:index.php');
	exit();
}
//// include 
include_once'../inc/dbconn.php';

	  $ID=$_GET['mov_id'];
	  
	   $sql = "SELECT * FROM `movies` WHERE `mov_id`='$ID'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		
    $file_img = $row['img_name'];
     $file_vid = $row['vid_name'];
     
    $dir = "../upload/";
    
    if(file_exists($dir.'/'.$file_img)){
    unlink($dir.'/'.$file_img);
 }
    
  if(file_exists($dir.'/'.$file_vid)){
  unlink($dir.'/'.$file_vid);
 } 
    
mysqli_query($conn,"DELETE FROM movies WHERE mov_id='$ID'");
				
header('location:../all-movies.php');


  
?>
