<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
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
        if (isset($_SESSION['ID'])) {
            echo "vous etes deja connecté, redirection dans 5 secondes";
            header('Refresh: 5; URL=index.php');
        } else if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
            //On se connecte à la base de données et on vérifie les informations
            //Si l'authentification est OK, on créé les variables de session ID et pseudo en leur assignant l'id de l'utilisateur et son pseudo
            require "connection.php" ;
            //Sinon, on affiche un message d'erreur suivi du formulaire d'authentification
            $req = $bdd->prepare("SELECT ID FROM utilisateurs WHERE pseudo=:pseudo AND empreinte=:empreinte");
            $req->execute(array(
            "pseudo" => $_POST["pseudo"],
            "empreinte" => hash("sha256", "jaimelesbananes".$_POST["mdp"])
            ));

            //while ( $donnees = $req->fetch() )
            $donnees = $req->fetch();
            if ($donnees) {	
                $_SESSION['pseudo'] = $_POST["pseudo"];
                $_SESSION["ID"] = $donnees['ID'];
                echo "connexion réussite, redirection dans 5 secondes";
                header('Refresh: 5; URL=index.php');
            }else{
                echo "mdp incorrect";
                require "formulaireconnexion.php" ;
            }
        } else {
            //echo hash("sha512", "jaimelesbananes"."supersayan"."jaimelesbananes");
            require "formulaireconnexion.php";
        }
    ?>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
</body>

</html>
