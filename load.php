<?php
session_start();
require "connection.php";

if (isset($_SESSION["ID"]))
{
    $req = $bdd->prepare("SELECT id, pseudo, coins, nbClic, tempsPasse FROM utilisateurs WHERE id=:id");
    $req->execute(array(
        "id" => $_SESSION['ID']
    ));

    //while ( $donnees = $req->fetch() )
    $donnees = $req->fetch();
    if ($donnees) {
        echo ("{\"login\":\"".$donnees['pseudo'].
            "\",\"score\":\"".$donnees['coins'].
            "\",\"nbClic\":\"".$donnees['nbClic'].
            "\",\"tempsPasse\":\"".$donnees['tempsPasse']);


            
            $req = $bdd->prepare("select idAmel from amelioration");
            $req->execute();
            while ($donnees = $req->fetch()){
                $req2 = $bdd->prepare("SELECT idjoueur, idAmel, level FROM joueuramel WHERE idjoueur=:idjoueur and idAmel=:idAmel");
                $req2->execute(array(
                    "idjoueur" => $_SESSION['ID'],
                    "idAmel" => $donnees['idAmel']
                ));
                $donnees2 = $req2->fetch();
                if ($donnees2) {
                    echo("\",\"amel".$donnees['idAmel']."\":\"".$donnees2['level']);
                }
            }
        echo("\"}");
    }
}else{
    echo("non connecté");
}
?>