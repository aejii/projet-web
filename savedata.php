<?php
session_start();
require "connection.php";

 if (isset($_SESSION["ID"]))
 {
    if(isset($_POST["login"]) &&
        isset($_POST["score"]) &&
        isset($_POST["tempsPasse"])
      ){

        $req = $bdd->prepare("UPDATE utilisateurs SET coins=:coins, tempsPasse=:tempsPasse WHERE id=:id");
        $req->execute(array(
            "id" => $_SESSION['ID'],
            "coins" => $_POST["score"],
            "tempsPasse" => $_POST["tempsPasse"]
        ));
    }
 }else{
     echo("non connecté");
 }
?>
