<?php
$thisPage="Create Seating Chart";

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


<div id="maincontent">
<p><h3>Future home of seating chart creator (using JavaScript).  <a href="instructions.php">(Instructions)</a></h3></p>

</div>

<?php
require_once("footer.php");
?>