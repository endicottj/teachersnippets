<?php

if(session_status() === PHP_SESSION_NONE) {
	session_start();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher Snippets</title>
<link href="mystyle.css" type="text/css" rel="stylesheet" />
<link rel="icon" href="favicon.jpg" type="image/gif" sizes="16x16" />
</head>
<body>
<div class = "header">
<!--This is a text version of the teacher snippets icon:
<a href="index.php"><div class="icon"><p id="teacher">TEACHER</p><p id="snippets">SNIPPETS</p><p id="com">.COM</p></div></a>
-->
<a href="welcome.php"><img class="logo" src="teachersnippetslogo.jpg" alt="Teacher Snippets Logo"></a>
</div>
<div class="navbar" id = "rightnavbar">
	<ul>
		<li<?php if ($thisPage=="Create Seating Chart") 
			echo " id=\"currentpage\""; ?>><a href="createseatingchart.php">Create Seating Chart</a></li>
		<li><a href="signout.php">Sign Out</a></li>
	</ul>
</div>
<div class="content">
