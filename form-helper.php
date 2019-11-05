<?php

// Redirects user, saves errors in session array, saves presets in session array
function redirectError($location, $errors, $presets = NULL) {
	$_SESSION['errors'] = $errors;
	if($presets) {
		$_SESSION['presets'] = $presets;
	}
	header("Location: $location");
	die;	// if redirect fails, exit program.  Prevents users seeing pages without being logged in.
}

// Redirects user successfully
function redirectSuccess($location, $user = NULL) {
	if($user) {
		$_SESSION['user'] = $user;
	}
	header("Location: $location");
}

// Prints error for given key, if one exists
function displayError($key) {
if(isset($_SESSION['errors'][$key])) { ?>	
	<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
<?php }
}

?>