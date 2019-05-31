<?php
session_start();
require "connection.php";

if (isset($_SESSION["ID"]))
{
    if(isset($_POST["login"]) && isset($_POST["score"])){
        $req = $bdd->prepare("UPDATE utilisateurs SET coins=:coins WHERE id=:id");
        $req->execute(array(
            "id" => $_SESSION['ID'],
            "coins" => $_POST["score"]
        ));
    }
}else{
    echo("non connecté");
}
?>