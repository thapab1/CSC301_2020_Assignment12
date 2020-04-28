<?php
session_start();
require_once('../includes/functions.php');
require_once('../includes/authentication.php');

if(count($_POST)>0){ // when user submits form:
	$error=signin();
	if(isset($error{0})) echo $error;
  else echo "Sign in successfully. Come back to our <a href='../index.php'>Home Page</a>.";
} else {
  displayPageHeader("Access your account");
  echo  '<h1>Access your account</h1>
    <form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="post">
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" required minlength="8" >
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>';
displayPageFooter();
}