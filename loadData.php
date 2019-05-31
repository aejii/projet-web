<?php
session_start();
require "connection.php";

if (isset($_SESSION["ID"]))
{
  // récupère info joueur
    $req = $bdd->prepare("SELECT id, pseudo, coins, nbClic, tempsPasse FROM utilisateurs WHERE id=:id");
    $req->execute(array(
        "id" => $_SESSION['ID']
    ));
    $donnees = $req->fetch();
    if ($donnees) {
      $resultat = array(
        'login' => $donnees['pseudo'],
        'score' => $donnees['coins'],
        'nbClic' => $donnees['nbClic'],
        'tempsPasse'=> $donnees['tempsPasse']
      );
          $req = $bdd->prepare("select idAmel, baseDamage, coinsforlvlup, coinsforunlock from amelioration");
          $req->execute();
          while ($donnees = $req->fetch()){
              $req2 = $bdd->prepare("SELECT idjoueur, idAmel, level FROM joueuramel WHERE idjoueur=:idjoueur and idAmel=:idAmel");
              $req2->execute(array(
                  "idjoueur" => $_SESSION['ID'],
                  "idAmel" => $donnees['idAmel']
              ));
              $donnees2 = $req2->fetch();
              if ($donnees2) {
                  $resultat['ameliorations'] [$donnees['idAmel']] = array(
                    'lvl' => $donnees2['level'],
                    'basedmg' => $donnees['baseDamage'],
                    'lvlup' => $donnees['coinsforlvlup'],
                    'unlock' => $donnees['coinsforunlock']
                  );
              }
          }

          $req = $bdd->prepare("select idAchiev, type, nbdeblocage from achievement");
          $req->execute();
          while ($donnees3 = $req->fetch()){
              $req2 = $bdd->prepare("SELECT idjoueur,description joueurachiev.idAchiev as idAchiev2, quand, nom, imageLink FROM joueurachiev join achievement on joueurachiev.idAchiev = achievement.idAchiev WHERE idjoueur=:idjoueur and joueurachiev.idAchiev=:idAchiev");
              $req2->execute(array(
                  "idjoueur" => $_SESSION['ID'],
                  "idAchiev" => $donnees3['idAchiev']
              ));
              $donnees4 = $req2->fetch();
              if (!$donnees4) {
                $resultat['success'][$donnees3['idAchiev']] = array(
                  'type' => $donnees3['type'],
                  'nbdeblocage'=> $donnees3['nbdeblocage']
                );
              }
          }

        echo json_encode($resultat);
    }
}else{
    echo("non connecté");
}
?>
