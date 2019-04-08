	<?php
		if (isset($_SESSION["ID"]))
		{
	?>
	<li class="lio"><a href="index.php">Home</a></li>
    <li class="lio"><a href="profile.php">Profile</a></li>
    <li class="lio"><a href="index.php?deco=1">Déconnexion</a></li>
	<?php
		}
		else
		{
			header('Location: login.php'); 
		}
	?>