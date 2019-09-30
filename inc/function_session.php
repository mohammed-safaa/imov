<?php
session_start();
session_regenerate_id();

if(!isset($_SESSION['user'])){
	header('location:login.php');
	exit();
}


?>