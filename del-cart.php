<?php 
	include_once('conn.php');
	$stt = $_GET['stt'];
	session_start();
	array_splice($_SESSION['giohang'], $stt ,1);
	if(count($_SESSION['giohang']) == 0){
		unset($_SESSION['giohang']);
	}
	header('location: shoppingcart.php');

?>