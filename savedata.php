<?php
require "connection.php" ;

// Mise à jour du nombre de click
$majnbclic = "UPDATE utilisateurs SET nbClic= :nbClic WHERE pseudo= :pseudo";
$req = $bdd->prepare($majnbclic);
$req->execute(array(
  "nbClic" => $_POST['nbClic'],
  "pseudo" => $_POST['pseudo']
));
echo json_encode("maj nombre de clic ".$_POST['nbClic']);
