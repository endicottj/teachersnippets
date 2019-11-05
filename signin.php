<?php 
$thisPage="Sign In";
require_once("header-signin.php");
require_once("form-helper.php");

// begins a new session for the current client
session_start();	

// Initializes presets array to empty strings
if(empty($_SESSION['presets'])) {
$_SESSION['presets'] = array('fullName' => "",
							'email' => "",
							'password' => "",
							'password_match' => "");
}

?>
	
<div id="user-login">
<h3>Sign In</h3>

<!-- Form on client side -->
<form method = "POST" action="signin-handler.php">
<!-- Input:  Email -->
<p>
<label for="email">Your Email:</label>
<input type="text" id="email" name="email" maxLength="50" required value="<?= $_SESSION['presets']['email'] ?>">
<?php displayError('email'); ?>
</p>
<!-- Input:  Password -->
<p>
<label for="password">Your Password:</label>
<input type="password" id="password" name="password" minlength="8" required value="<?= $_SESSION['presets']['password'] ?>">
<?php displayError('password'); ?></p>
<!-- Input:  "Sign In" Button -->
<p>
<input type="submit" value="Sign In">
</p>

<!-- Forgot password? 
<a href="forgotpassword.php">Forgot password?</a> --> 
</form> 

<!-- Create account --> 
<p id="signincreate">
	<h3>Don't have an account?<h3>
	<a href="createaccount.php">Sign Up!</a>
</p>

</div>	

<?php
require_once("footer.php");
?>
