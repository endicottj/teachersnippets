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

<p><h3>Instructions.  <a href="createseatingchart.php">(Create seating chart)</a></h3></p>
<p>1. On the first line, enter which group numbers to include, separated by spaces.  Each group contains 4 students.</p>
<div id="groupnumbers">
	<p>FRONT</p>
	<p>1  2  3  4 </p>
	<p>5  6  7  8 </p>
	<p>9  10 11 12</p>
	<p>13 14 15 16</p>
</div>
<p>2. On the second line, enter student names for 'warriors,' separated by spaces. This should be a fourth of your class (strength: confidence).</p>
<p>3. On the third line, enter student names for 'healers,' separated by spaces. This should be a fourth of your class (strength: maturity).</p>
<p>4. On the fourth line, enter student names for 'mages1,' separated by spaces. This should be a fourth of your class (strength: intelligence).</p>
<p>5. On the fifth line, enter student names for 'mages2,' separated by spaces. This should be a fourth of your class (strength: intelligence).</p>

</div>

<?php
require_once("footer.php");
?>