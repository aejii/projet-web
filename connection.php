<?php 

$bdd = new PDO("mysql:host=localhost;dbname=projetweb", "root", "xxxx"); 
$serveur = "mysql";
$host = "localhost";
$base = "projetweb";
$user = "root";
$pass = "xxxx";



//requete de "toute" les pages
$loginrequete = "SELECT ID FROM utilisateurs WHERE pseudo=:pseudo AND empreinte=:empreinte";


$wherepseudo = "SELECT ID FROM utilisateurs WHERE pseudo=:pseudo";

$creationuser = "INSERT INTO utilisateurs (`pseudo`,`empreinte`,`insciption`,`image`,`role` , `ipinscription`, `lienvalidation`, `email`, `resetmdp`) VALUES (:pseudo , :empreinte , :insciption , :image ,1, :ip, :lienvalidation, :email, :resetmdp )";

$newmessage = "INSERT INTO messages (`id_utilisateur`,`id_discussion`,`creation` , `contenu`) VALUES (:id_utilisateur , :id_discussion , :creation, :contenu )";

$affichageconversation = "SELECT utilisateurs.pseudo AS pseudo, utilisateurs.image AS image, messages.creation AS creation, messages.contenu AS contenu FROM messages INNER JOIN utilisateurs ON Messages.ID_Utilisateur = Utilisateurs.ID WHERE messages.ID_Discussion=:id ORDER BY messages.creation ASC";

$creationdiscussion = "INSERT INTO discussions (`titre`,`creation`,`auteur`) VALUES (:titre , :creation , :auteur )";

$afficherlistediscussion = "SELECT id_discussion, TITRE, CREATION, AUTEUR FROM discussions";

$nbrmsgenvoyer = "SELECT COUNT(ID) AS nbMessages FROM messages WHERE ID_Discussion=:id";

$derniermsgenvoyer = "SELECT MAX(creation) AS dateMaximum FROM messages WHERE ID_Discussion=:id";

?>