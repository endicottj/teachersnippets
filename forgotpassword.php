<?php 
$thisPage="Sign In"; 
require_once("header-signin.php");
?>

<div id="user-login">
<h3>Forgot your password?</h3>
	
<form action="actionpage.php">
<p><input type="text" name="email" value="email"></p>
<p><input type="submit" value="SEND"></p>
</form> 

<p id="signincreate">We'll send you a link to reset your password =)</p>

</div>	

<?php
require_once("footer.php");
?>
