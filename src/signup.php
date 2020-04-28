<?php
session_start();
require_once('../includes/functions.php');
require_once('../includes/authentication.php');
if(is_logged('user/email')) header('location: ../index.php');

if(count($_POST)>0){ // when user submits form:
	$error=signup();
  if(isset($error{0})) echo $error;
} else {

  displayPageHeader("Create a new account");
    
  echo '<h1>Create a new account</h1>
  <form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="post">
    <div class="form-group">
      <label>Your Name</label>
      <input type="text" class="form-control" name="name" required minlength="2" >
    </div>
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" required minlength="8" >
    </div>
    <br>
    <hr/>
    <br>
    <div class="form-group row">
        <label class="col-md-3" for="household-age">Your age:</label>
        <input type="number" class="form-control col-sm-4" name="household-age" placeholder="Enter your age" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="household-sex">Select your sex:</label>
        <select class="form-control col-sm-4" name="household-sex">
            <option selected>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="household-img">Profile picture:</label>
        <input type="url" class="form-control col-sm-4" name="household-img" placeholder="Enter the link to your profile picture" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-cleanliness">Cleanliness:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-cleanliness" placeholder="Level of cleanliness" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-bedtime">Bedtime:</label>
        <input type="time" class="form-control col-sm-4" name="lifestyle-bedtime" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-food">Food preference:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-food" placeholder="What kind of food do you like?" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-occupation">Occupation:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-occupation" placeholder="What do you do?" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="flatmate-expectation">Flatmate Expectation:</label>
        <input type="text" class="form-control col-sm-4" name="flatmate-expectation" placeholder="What do you expect from your flatmate">
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="phone-number">Enter your phone number:</label>
        <input type="tel" class="form-control col-md-4" name="phone-number" placeholder="859-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>';

  displayPageFooter(); 
}
?>