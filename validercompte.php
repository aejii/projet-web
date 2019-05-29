<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Validation compte</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="styleLogin.css" rel="stylesheet">
</head>

<body>
    <?php
        session_start();
        // include_once('Statistiques.class.php');
        // $stats = new Statistiques();

        if (isset($_GET["validation"])){
            require "connection.php";
            // on vérifie que le hash existe

            $req = $bdd->prepare("SELECT id, inscription, lienvalidation FROM utilisateurs WHERE lienvalidation=:validation");
            $req->execute(array(
                "validation" => $_GET["validation"]
            ));

            $donnees = $req->fetch();
            // hash existant
            if ($donnees) {
                // on update le champ lienvalidation
                $req = $bdd->prepare("UPDATE utilisateurs SET lienvalidation=:vide , role=:role WHERE lienvalidation=:lienvalidation");
                $req->execute(array(
                    "vide" => "",
                    "lienvalidation" => $_GET["validation"],
                    "role" => 1
                ));
                // compte valider
                $titre = "Compte valider avec succes";
                $form = 7;
                require "trucentrer.php";
            } else {
                $titre = "Lien de validation introuvable :/";
                $form = 4;
                require "trucentrer.php";
            }
        }
        ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>