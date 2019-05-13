<?php
session_start();
require "connection.php";

if (isset($_SESSION["ID"]))
{
    $req = $bdd->prepare("SELECT id, pseudo, coins FROM utilisateurs WHERE id=:id");
    $req->execute(array(
        "id" => $_SESSION['ID']
    ));

    //while ( $donnees = $req->fetch() )
    $donnees = $req->fetch();
    if ($donnees) {
        echo ("{\"pseudo\":\"".$donnees['pseudo'].
            "\",\"coins\":\"".$donnees['coins'].
            "\"}");
    }
}else{
    echo("cc");
}


/*
console.log("recuperation donnee");
var coins;
if (document.getElementById("pseudo").value == "") {
    alert("veuillez entrer votre pseudo pour charger votre partie");
}else{
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "http://localhost:8080/projetweb/getsave.php;
    xhr.onreadystatechange = function (e) {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log("onreadystatechange : "+xhr.responseText);
            if (xhr.responseText == "new") {
                alert("nouvelle sauvegarde");
            }else{
                var obj = JSON.parse(xhr.responseText);
                coins = parseInt(obj.coins);
            }
        }
    }
}*/
?>