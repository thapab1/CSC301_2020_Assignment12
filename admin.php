<?php
session_start();
include('includes/functions.php');
include('includes/authentication.php');

displayPageHeader('Admin Section');
?>
<br><br>
<?php
    if(is_admin())
        echo '<div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary btn-lg" href="src/createUser.php" role="button">Create User</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary btn-lg" href="src/editUser.php" role="button">Edit User</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary btn-lg" href="src/editRoom.php" role="button">Edit Room</a>
        </div>
        </div>';
    else
        echo "This page is for admin only";

?>
<?php displayPageFooter(); ?>
