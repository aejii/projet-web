<header>
	<div id="banniere">
		<img src="Images/logo.png"/>
		<strong> Forum de Pirates</strong>
	</div>
	<div id="menu">
	<?php
		if (isset($_SESSION["ID"]))
		{
	?>
	<div class="onglet"><a href="forum.php">Forums</a></div>
	<div class="onglet"><a href="index.php?deco=1">Deconnexion</a></div>
	<?php
		}
		else
		{
	?>
	<div class="onglet"><a href="login.php">Se connecter</a></div>
	<div class="onglet"><a href="inscription.php">s'inscrire</a></div>
	<?php
		}
	?>
	</div>
</header>