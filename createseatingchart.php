<?php $thisPage="Create Seating Chart"; ?>

<body>
    <?php
		require_once("header.php");
		require_once("navbar.php");
	?>
	<div class="content">
		<p><h3>To create a seating chart, enter group numbers and student names.  <a href="instructions.php">Click here for instructions.</a></h3></p>
		<form action="actionpage.php">
			<p><textarea rows = "18" cols = "150" >Enter text here.</textarea></p>
			<p><input type="text" name="filename" value="Enter filename. (.txt)"></p>
			<p>
				<input type="submit" value="Save raw file">
				<input type="submit" value="Generate & save">
			</p>
		</form> 
		<p><h3>My Saved Raw Files</h3></p>
			<ul>
				<li>To do:  Add a functioning list of links to raw files with timestamps and ability to delete.  (JavaScript?)</li>
				<li>Example:  pd1roster.txt     9/15/19     2:10PM     Delete</li>
			</ul>
	</div>
</body>

<?php
	require_once("footer.php");
?>