<?php 
$thisPage="Home"; 
require_once("session-helper.php");
session_start();
signoutUser();
require_once("header-signin.php");
?>

<div id = "homecontent">
<p><h1>You have successfully signed out.</h1></p>
<p><h3>Thanks for visiting Teacher Snippets!  Hope to see you again soon.</h3></p>
</div>

<?php
require_once("footer.php");
?>