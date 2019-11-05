<?php 

$thisPage="Create Account";
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

<h3>Create a free account</h3>

<!-- Form on client side -->
<form method = "POST" action="registration-handler.php">
<!-- Input:  Full Name -->
<p>
<label for="fullName">Your Name:</label>
<input type="text" id="fullName" name="fullName" maxlength="50" required value="<?= $_SESSION['presets']['fullName'] ?>">
<?php displayError('fullName'); ?>
</p>
<!-- Input:  Email -->
<p>
<label for="email">Your Email:</label>
<input type="email" id="email" name="email" maxLength="50" required value="<?= $_SESSION['presets']['email'] ?>">
<?php displayError('email'); ?>
</p>
<!-- Input:  Password -->
<p>
<label for="password">Create Password:</label>
<input type="password" id="password" name="password" minlength="8" required value="<?= $_SESSION['presets']['password'] ?>">
<?php displayError('password'); ?>
</p>
<!-- Input:  Password Again -->
<p>
<label for="password_match">Confirm Password:</label>
<input type="password" id="password_match" name="password_match" minlength="8" required value="<?= $_SESSION['presets']['password_match'] ?>">
<?php displayError('password_match'); ?>
</p>
<!-- Input:  "START" Button -->
<p>
<input type="submit" value="START">
</p>
</form> 

<div id="signincreate">
<h3>Already have an account?<h3>
<a href="signin.php">Sign in</a>
</div>

</div>	

<?php
require_once("footer.php");
?>