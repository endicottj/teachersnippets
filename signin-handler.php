<?php
session_start();	// begins a new session for the current client

require_once("Dao.php");
require_once("form-helper.php");
require_once("session-helper.php");

// Extract all variables from $_POST superglobal array.
$email = trim($_POST['email']);
$password = $_POST['password'];

// Set errors array and presets array
$errors = array();
$presets = ['email' => htmlspecialchars($email),
			'password' => htmlspecialchars($password)];

// VALDATE FIELD FROM SERVER SIDE.  SET ERROR IF APPLICABLE.
// Email
if(strlen($email) <= 0 || strlen($email) > 50) {
	$errors['email'] = "Email is required.  Must be less than 50 characters.";

} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors['email'] = "Must be a valid email address.";
}
// Password
if(strlen($password) < 8) {
	$errors['password'] = "Password is required.  Must be at least 8 characters.";
}

?>

<!-- POST, REDIRECT, GET.  Must occur before printing any output. -->
<?php
// If no errors, then direct the user to the welcome page.
if(empty($errors)) {
	try {
		$dao = new Dao();
		// 1. Validate user exists and password is correct
		$user = $dao->validateUser($email, $password);
		if ($user) {
			signinUser($user);	// Sets access granted flag to true
			redirectSuccess("welcome.php");
		} else {
		$errors['message'] = "Invalid email or password.";
		redirectError("signin.php", $errors, $presets);
		}
	} catch (Exception $e) {
		//log statements
		//echo $e->getMessage();
		$errors['message'] = "Something is not right.  Please contact support.";
		redirectError("signin.php", $errors, $presets);
	}
	
	
} else {
	redirectError("signin.php", $errors, $presets);
}

?>