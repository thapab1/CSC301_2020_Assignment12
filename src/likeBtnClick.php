<?php
require_once('../includes/database.php');
require_once('../includes/authentication.php');

if (is_logged() && isset($_REQUEST['id']) && $_REQUEST['id'] >= 0) {
	$id = $_REQUEST['id'];
    $likeCount = $database->incrementLike($id);
    echo "( " . $likeCount . " Likes)";
} else {
    echo "N/A";
}

?>