<?php
session_start();	// begins a new session for the current client

require_once("form-helper.php");
require_once("session-helper.php");
require_once("Dao.php");

// Extract all variables from $_POST superglobal array.
$fullName = trim($_POST['fullName']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$password_match = $_POST['password_match'];

// Set errors array and presets array
$errors = array();
$presets = ['fullName' => htmlspecialchars($fullName),
			'email' => htmlspecialchars($email),
			'password' => htmlspecialchars($password),
			'password_match' => htmlspecialchars($password_match)];

// VALDATE FIELD FROM SERVER SIDE.  SET ERROR IF APPLICABLE.
// Full Name
if(strlen($fullName) <= 0 || strlen($fullName) > 50) {
	$errors['fullName'] = "Full name is required.  Must be less than 50 characters.";
}
// Email
if(strlen($email) <= 0 || strlen($email) > 50) {
	$errors['email'] = "Email is required.  Must be less than 50 characters.";

} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors['email'] = "Must be a valid email address.";
}
// Password
if(strlen($password) < 8) {
	$errors['password'] = "Password is required.  Must be at least 8 characters.";
} else if($password != $password_match) {
	$errors['password_match'] = "Passwords do not match.";
}

?>

<!-- POST, REDIRECT, GET.  Must occur before printing any output. -->
<?php
// If no errors, then direct the user to the welcome page.
if(empty($errors)) {

	try {

		// Not in Marissa's video.  But I'm leaving it.
		$dao = new Dao();

		// Checks if user exists
		if($dao->userExists($email)) {
			// Sets error for duplicate email, redirects user
			$errors['email'] = "Can't add user. Already exists.";	
			redirectError("createaccount.php", $errors, $presets);
		} else {
			// Redirects user to welcome page for successful account creation
			if($dao->addUser($email, $password, $fullName)) {
				$user = $dao->validateUser($email, $password);
				signinUser($user);	// Sets access granted flag to true
				redirectSuccess("welcome.php");
			} else {
				// Sets error for unexpected, redirects user
				$errors['email'] = "Unexpected error. (Email is null?)";
				redirectError("createaccount.php", $errors, $presets);
			}
		}
	} catch (Exception $e) {
		//log statements
		//echo $e->getMessage();
		$errors['message'] = "Something is not right.  Please contact support.";
		redirectError("createaccount.php", $errors, $presets);
	}
}
// Else, redirect them back to the form.
else {
	$_SESSION['errors'] = $errors;	// stores a session variable, in this case an array of errors
	// stores an array of presets, so user does not have to reenter data
	$_SESSION['presets'] = array('fullName' => htmlspecialchars($fullName),
									'email' => htmlspecialchars($email),
									'password' => htmlspecialchars($password),
									'password_match' => htmlspecialchars($password_match));
	header('Location: createaccount.php');
}

?>