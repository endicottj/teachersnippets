<?php 
$thisPage="Home"; 
require_once("form-helper.php");
require_once("session-helper.php");
session_start();

if(!isAccessGranted()) {
	// redirect to login page
	$errors['message'] = "You must sign in first.";
	header("Location: signin.php");
	redirectError("signin.php", $errors);
}

$user = $_SESSION['username'];

require_once("header.php");
?>

<div id = "homecontent">
<p><h1>Welcome, <?= $user ?>!</h1></p>
<p><h3>You have signed in, please feel free to begin.</h3></p>
</div>

<?php
require_once("footer.php");
?>