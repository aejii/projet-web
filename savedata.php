<?php
session_start();
require "connection.php";

 if (isset($_SESSION["ID"]))
 {
    if(isset($_POST["login"]) &&
        isset($_POST["score"]) &&
        isset($_POST["tempsPasse"]) &&
        isset($_POST["nbClic"]) &&
        isset($_POST["ameliorations"])
      ){

        $req = $bdd->prepare("UPDATE utilisateurs SET coins=:coins, nbClic=:nbClic, tempsPasse=:tempsPasse WHERE id=:id");
        $req->execute(array(
            "id" => $_SESSION['ID'],
            "coins" => $_POST["score"],
            "nbClic" => $_POST["nbClic"],
            "tempsPasse" => $_POST["tempsPasse"]
        ));
        $ameliorations = json_decode($_POST["ameliorations"], true);
        foreach ($ameliorations as $key => $value) {
          $req = $bdd->prepare("UPDATE joueuramel SET level=:level WHERE idjoueur=:idJoueur and idAmel=:idAmel");
          $req->execute(array(
              "level" => $value["lvl"],
              "idJoueur" => $_SESSION['ID'],
              "idAmel" => $key
          ));
        }
        echo ("Sauvegarde données Ok");
    }

 }else{
   if(isset($_POST["successId"])) {
     $req = $bdd->prepare("INSERT INTO joueurachiev (idjoueur, idAchiev, quand) VALUES (:idjoueur, :idAchiev, now())");
     $req->execute(array(
         "idjoueur" => 1,
         "idAchiev" => $_POST["successId"]
     ));
     echo ("Sauvegarde succès Ok");
   }
     //echo("non connecté");
 }
?>
