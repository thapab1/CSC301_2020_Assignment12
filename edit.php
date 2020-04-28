<?php
require_once('includes/functions.php');
require_once('includes/database.php');
require_once('includes/authentication.php');

displayPageHeader('Edit Room Info');

if (is_admin() || is_manager() || $database->is_postOwner($_GET['id'])) {
    if(count($_POST) > 0){
        $database->editRoomInfo($_POST,$_GET['id']);
        echo "Room is edited successfully. Come back to our <a href='index.php'>Home Page</a>.";
    } else {
        if(!isset($_GET['id'])){
            echo 'Please visit our <a href="index.php">Home Page</a>.';
            die();
        }
        if($_GET['id']<0){
            echo 'Something went wrong! Please come back to our <a href="index.php">Home Page</a>.';
            die();
        }
            
        $id = $_GET['id'];
        $room = $database->getRoomInfo($id);
        include('includes/edit_template.php');
    }
} else {
	echo 'You are not allowed to edit this room posting. Click <a href="index.php">here</a> to go back to home page.';
}
displayPageFooter(); ?>