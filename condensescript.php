<?php 
$thisPage="Condense Script"; 

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

<div id = "maincontent">

<p><h3>To condense a script, enter text below.</h3></p>

<form action="actionpage.php">
<p><textarea rows = "18" cols = "150" >Enter text here.</textarea></p>
<p><input type="text" name="filename" value="Enter filename. (.txt)"></p>
<p>
	<input type="submit" value="Save raw file">
	<input type="submit" value="Generate & save">
</p>
</form> 

<p><h3>My Saved Raw Files</h3></p>

<ul>
	<li>To do:  Add a functioning list of links to raw files with timestamps and ability to delete.  (JavaScript?)</li>
	<li>Example:  fullscript1.txt     9/15/19     2:10PM     Delete</li>
</ul>

</div>

<?php
require_once("footer.php");
?>
