<?php
session_start();
require "connection.php";

 if (isset($_SESSION["ID"]))
 {
    if(isset($_POST["login"]) &&
        isset($_POST["score"]) &&
        isset($_POST["tempsPasse"]) &&
        isset($_POST["nbClic"])
      ){

        $req = $bdd->prepare("UPDATE utilisateurs SET coins=:coins, nbClic=:nbClic, tempsPasse=:tempsPasse WHERE id=:id");
        $req->execute(array(
            "id" => $_SESSION['ID'],
            "coins" => $_POST["score"],
            "nbClic" => $_POST["nbClic"],
            "tempsPasse" => $_POST["tempsPasse"]

        ));
    }
 }else{
     echo("non connecté");
 }
?>
