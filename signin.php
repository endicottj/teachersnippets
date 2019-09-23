<?php $thisPage="Sign In"; ?>

<body>
    <?php
		require_once("header.php");
		require_once("navbar.php");
	?>
	<div class="content">
		<p>
		<div id="user-login">
			<h3>Sign In</h3>
			<form action="actionpage.php">
				 <p><input type="text" name="email" value="email"></p>
				 <p><input type="text" name="password" value="password"></p>
				 <p>
					<input type="submit" value="Sign In">
					<a href="forgotpassword.php">Forgot password?</a>
				</p>
			</form> 
			<p id="signincreate">
				<h3>Don't have an account?<h3>
				<a href="createaccount.php">Sign Up!</a>
			</p>
		</div>	
		</p>
	</div>
</body>

<?php
	require_once("footer.php");
?>
