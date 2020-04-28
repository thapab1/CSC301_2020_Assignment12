<?php
require_once('db_connection.php');

function is_logged(){
	return isset($_SESSION['userID']);
}

function is_manager(){
	return $_SESSION['userLevel'] == 2;
}

function is_admin(){
	return $_SESSION['userLevel'] == 3;
}

function signout(){
	if(!isset($_SESSION['userID'])) header('location: index.php');
	session_start();
	$_SESSION=[];
	session_destroy();
	header('location: signin.php');
}

function signin(){
	global $conn;
	if(count($_POST)>0){ // when user submits form:
		if (empty($_POST["email"])) {
			return "Email is required";
		} else {
			$_POST['email']=htmlspecialchars($_POST['email']); // sanitize email
			// removes space and other predefined characters from both sides of email
			$_POST['email']=trim($_POST['email']);
			// check if email is valid
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				return 'The email you entered is not valid';
			}
			$_POST['email']=strtolower($_POST['email']);
		}
		
		if (empty($_POST["password"])) {
			return "Password is required";
		} else {
			$_POST['password']=htmlspecialchars($_POST['password']); // sanitize password
			// check if password is valid and check if password meets requirements
			// I do not trim password, because in some cases, 
			// users intentionally use space at the beginning or the end of their password
			if(strlen($_POST['password'])<8){
				return 'The password must be at least 8 characters';
			}
		}
		
		$sql = 'SELECT * FROM users WHERE email = "'. $_POST['email'] . '"';
		$result = mysqli_query($conn,$sql);
		
		if (!$result) {
			echo "Error: " . $sql . "<br/><br/>" . mysqli_error($conn);
		}

		if (mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			if (password_verify($_POST['password'], $row['password'])) {
				$_SESSION['userID']=$row['id'];
				$_SESSION['userLevel']=$row['userLevel'];
				return '';
			}
		}
		return 'Please <a href="signup.php">Sign up</a>';
	}
}


function signup(){
	global $conn;
	if(count($_POST)>0){ // when user submits form:
		if (empty($_POST["email"])) {
			return "Email is required";
		} else {
			$_POST['email']=htmlspecialchars($_POST['email']); // sanitize email
			// removes space and other predefined characters from both sides of email
			$_POST['email']=trim($_POST['email']);
			// check if email is valid
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				return 'The email you entered is not valid';
			}
			$_POST['email']=strtolower($_POST['email']);
		}
		
		if (empty($_POST["password"])) {
			return "Password is required";
		} else {
			$_POST['password']=htmlspecialchars($_POST['password']); // sanitize password
			// check if password is valid and check if password meets requirements
			// I do not trim password, because in some cases, 
			// users intentionally use space at the beginning or the end of their password
			if(strlen($_POST['password'])<8){
				return 'The password must be at least 8 characters';
			}
		}

		if (empty($_POST["name"])) {
			return "First name and last name are required";
		} else {
			$_POST['name']=htmlspecialchars($_POST['name']); // sanitize name
			// removes space and other predefined characters from both sides of name
			$_POST['name']=trim($_POST['name']);
			// check if password meets requirements
			if(strlen($_POST['name'])<2){
				return 'The first name and last name must be at least 2 characters';
			}
		}

		// encrypt password
		$_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);

		$sql = 'INSERT INTO users (name,email,password,roomsForRent,age,sex,userLevel,';
		$sql .= 'profilePicture,phoneNumber,flatmateExpectation,cleanliness,bedtime,food)';
		$sql .= ' VALUES ("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['password'];
		$sql .= '","",'.$_POST['household-age'].',"'.$_POST['household-sex'].'",1';
		$sql .= ',"'.$_POST['household-img'].'","'.$_POST['phone-number'];
		$sql .= '","'.$_POST['flatmate-expectation'].'","'.$_POST['lifestyle-cleanliness'];
		$sql .= '","'.$_POST['lifestyle-bedtime'].'","'.$_POST['lifestyle-food'].'")';
		
		if (mysqli_query($conn,$sql)) {
			echo 'You successfully registered your account. Now you can <a href="signin.php">Sign in</a> or Come back to our <a href="../index.php">Home Page</a>';	
		} else {
			echo "Error: " . $sql . "<br/><br/>" . mysqli_error($conn);
		}

		return '';
	}
}


?>