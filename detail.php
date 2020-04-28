<?php
include('includes/functions.php');
include('includes/database.php');

displayPageHeader("Room Detail");

if(!isset($_GET['id'])){
	echo 'Please visit our <a href="index.php">Home Page</a>.';
	die();
}
if($_GET['id']<0){
	echo 'Something went wrong! Please come back to our <a href="index.php">Home Page</a>.';
	die();
} else {
	$id = $_GET['id'];
	$room = $database->getRoomInfo($id);
	$owner = $database->getUserInfo($room->postedBy);
	displayDetail($room, $owner);
}

displayPageFooter(); ?>