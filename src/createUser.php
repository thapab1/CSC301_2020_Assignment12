<?php
session_start();
require_once('../includes/functions.php');
require_once('../includes/authentication.php');
require_once('../includes/database.php');

displayPageHeader('Create User');
if (is_admin()) {
    if(count($_POST) > 0){
        $database->createUser($_POST);
        echo "User is created successfully. Come back to our <a href='../index.php'>Home Page</a>.";
    } else {
        include('../includes/admin_user_create_template.php');
    }
} else {
    echo "This page is for admin only";
}
displayPageFooter(); ?>