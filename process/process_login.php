<?php
session_start();
include '../inc/header.php';
include '../inc/dbconnected.php';

	if(isset($_POST['login'])){
		//connection
		

		//get the user with the username
		$sql = "SELECT * FROM users WHERE username = '".$_POST['username']."'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			//verify password
			if(password_verify($_POST['password'], $row['password'])){
				$_SESSION['user'] = $row['id'];
				
			}
			else{
				$_SESSION['error'] = 'Password incorrect';
			}
		}
		else{
			$_SESSION['error'] = 'No account with that username';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up login form first';
	}

	$json = file_get_contents('https://geoip-db.com/json');
$data = json_decode($json);

$country = $data->country_name ;
$city = $data->city;
$latitude = $data->latitude;
$longitude = $data->longitude;
$ipv4 = $data->IPv4;

$sql = "SELECT * FROM `location` WHERE `user_id` = '".$_SESSION['user']."'";
$query = $conn->query($sql);
$row2 = $query->fetch_assoc();
$id_location = $row2['id_location'];

if($row2>0){
	$sql="UPDATE `location` SET `country` = '$country', `city` = '$city', `latitude` = '$latitude', `longitude` = '$longitude', `ipv4` = '$ipv4', `user_id` = '".$_SESSION['user']."' WHERE `location`.`id_location` = $id_location";
	mysqli_query($conn,$sql);
   
}else{
	$sql="INSERT INTO `location` (`country`, `city`, `latitude`, `longitude`, `ipv4`, `user_id`) VALUES ( '$country', '$city', '$latitude', '$longitude', '$ipv4', '".$_SESSION['user']."')";
	mysqli_query($conn,$sql);
	
}
$conn->close();

echo '<script>window.location.assign("../index.php")</script>';

?>


