<?php 
$thisPage="My Saved Work";
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

<div><h3>My Seating Charts</h3>
<ul>
	<li>To do:  Add a functioning list of links to seating charts with timestamps and ability to delete.  (JavaScript?)</li>
	<li>Example:  SeatingChart1.txt     9/15/19     2:10PM     Delete</li>
</ul>
</div>

<div><h3>My Condensed Scripts</h3>
<ul>
	<li>To do:  Add a functioning list of links to condensed scripts with timestamps and ability to delete.  (JavaScript?)</li>
	<li>Example:  CondensedScript1.txt     9/15/19     2:10PM     Delete</li>
</ul>
</div>

</div>

<?php
require_once("footer.php");
?>
