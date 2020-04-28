<?php
require_once('includes/functions.php');
require_once('includes/database.php');
require_once('includes/authentication.php');
displayPageHeader('Add Room for Renting');

if(count($_POST) > 0){
    $database->addRoom($_POST);
    echo 'Your room is added successfully to our listing. 
    Click <a href="index.php"> here </a> to go back to homepage';
} else {
    if (is_logged())
        include('includes/create_template.php');
    else
        echo 'Please sign in before creating! <a href="src/signin.php"> Sign In </a>';
}

displayPageFooter(); ?>