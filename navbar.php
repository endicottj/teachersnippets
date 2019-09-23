<div id="navbar">
	<ul>
		<li<?php if ($thisPage=="Sign In") 
			echo " id=\"currentpage\""; ?>><a href="signin.php">Sign In</a></li>
		<li<?php if ($thisPage=="My Saved Work") 
			echo " id=\"currentpage\""; ?>><a href="mysavedwork.php">My Saved Work</a></li>
		<li<?php if ($thisPage=="Create Seating Chart") 
			echo " id=\"currentpage\""; ?>><a href="createseatingchart.php">Create Seating Chart</a></li>
		<li<?php if ($thisPage=="Condense Script") 
			echo " id=\"currentpage\""; ?>><a href="condensescript.php">Condense Script</a></li>
	</ul>
</div>