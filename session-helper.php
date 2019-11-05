<?php

// Signs out the user
function signoutUser() {
	// Unset all session variables.  Happens with session destroy, but only after page refreshed.
	session_unset();	

	// Clears out stale cookie from user's browser
	//setcookie(session_name(), '', time()-3600);	// sets cookie to time in the past

	// Makes sure a new cookie is used on next login.  Prevents session hijacking.
	session_regenerate_id(true);

	// Destroy the session data on the server.
	session_destroy();
}

// Sets signed in flag to true
function signinUser($user) {
	// 2. Set access_granted flag in our session array so we remember our user is logged in
	$_SESSION['access_granted'] = true;
	// 3. Remember some information about our user.  Getting from Dao in validateUser.
	$_SESSION['username'] = $user['name'];
	$_SESSION['userid'] = $user['id'];
	// generates new session id, in case session id is stolen it will be replaced when user logs in again.
	session_regenerate_id(true);	
	
}

// Returns true if user is authenticated, false otherwise.
function isAccessGranted() {
	if(isset($_SESSION['access_granted']) && ($_SESSION['access_granted'] === true)) {
		return true;
	} else {
		return false;
	}
}

?>