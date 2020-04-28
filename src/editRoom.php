<?php
session_start();
require_once('../includes/functions.php');
require_once('../includes/authentication.php');
require_once('../includes/database.php');

displayPageHeader('Edit Room');
if (is_admin()) {
    if(count($_POST) > 0){
        $database->editRoomInfo($_POST,$_POST['id']);
        echo "Room ".$_POST['id']." is edited successfully. Come back to our <a href='../index.php'>Home Page</a>.";
    } else {
        include('../includes/admin_room_edit_template.php');
    }
}
else {
    echo "This page is for admin only";
}
displayPageFooter(); ?>