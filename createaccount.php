<?php $thisPage="Sign In"; ?>

<body>
    <?php
		require_once("header.php");
		require_once("navbar.php");
	?>
	<div class="content">
		<p>
		<div id="user-login">
			<h3>Create a free account</h3>
			<form action="actionpage.php">
				 <p><input type="text" name="email" value="email"></p>
				 <p><input type="text" name="create_password" value="create password"></p>
				 <p>
					<input type="submit" value="START">
				</p>
			</form> 
			<p id="signincreate">
				<h3>Already have an account?<h3>
				<a href="signin.php">Sign in</a>
			</p>
		</div>	
		</p>
	</div>
</body>

<?php
	require_once("footer.php");
?>

