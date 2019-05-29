<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mot de passe oublié</title>
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

        if (isset($_SESSION['ID'])) {// on vérifie si l'utilisateur est connecté, si oui on le redirige
            $titre = "Vous etes deja connecté, redirection dans 5 secondes";
            $form = 6;
            require "trucentrer.php";
        } else if (isset($_POST["email"]) && !isset($_POST["mdp"]) && !isset($_POST["cmdp"])){// on simule l'envoi de l'email
            require "connection.php";
            // on vérifie que l'email existe
            $req = $bdd->prepare("SELECT ID FROM utilisateurs WHERE email=:email");
            $req->execute(array(
                "email" => $_POST["email"]
            ));

            $donnees = $req->fetch();
            // email existant
            if ($donnees) {	
                // on update le champ resetmdp
                $hash = hash("sha512", $_POST["email"].time());
                $req = $bdd->prepare("UPDATE utilisateurs SET resetmdp=:resetmdp WHERE email=:email");
                $req->execute(array(
                    "resetmdp" => $hash,
                    "email" => $_POST["email"]
                ));
                // on affiche le lien comme si c'était dans l'email
                $titre = "Modifier votre mdp (ceci est un email)";
                $form = 5;
                require "trucentrer.php";
            } else {
                $titre = "Email introuvable";
                $form = 4;
                require "trucentrer.php";
            }
        } else if(isset($_GET["reset"])){//ici on entre le nouveau mdp
            $titre = "Entrez votre nouveau mot de passe";
            $form = 3;
            require "trucentrer.php";
        } else if (isset($_POST["hash"]) && isset($_POST["mdp"]) && isset($_POST["cmdp"])) {// ici on modifie le mdp (puis on redirige vers login)
            require "connection.php";

            // on vérifie taille > 8 et mdp == cmdp
            if ($_POST["mdp"] == $_POST["cmdp"]) {
                if (strlen($_POST["mdp"])>=8) {
                    // si on trouve le hash alors on modifie le mdp
                    $req = $bdd->prepare("SELECT resetmdp FROM utilisateurs WHERE resetmdp=:resetmdp");
                    $req->execute(array(
                        "resetmdp" => $_POST["hash"]
                    ));
                    $donnees = $req->fetch();
                    // email existant
                    if ($donnees) {
                        $req = $bdd->prepare("UPDATE utilisateurs SET empreinte=:empreinte , resetmdp=:newresetmdp  WHERE resetmdp=:resetmdp");
                        $req->execute(array(
                            "empreinte" => hash("sha512", "jaimelesbananes".$_POST["mdp"]),
                            "resetmdp" => $_POST["hash"],
                            "newresetmdp" => ""
                        ));
                        $titre = "Mot de passe modifié avec succès, redirection dans 5 secondes";
                        $form = 2;
                        require "trucentrer.php";
                    }else{
                        $titre = "Demande modification mot de passe introuvable";
                        $form = 1;
                        require "trucentrer.php";
                    }
                }else{// mdp pas assez long
                    $_GET["reset"] = $_POST["hash"];
                    $titre = "Entrez votre nouveau mot de passe";
                    $form = 3;
                    $erreur = "votre mdp doit contenir plus de 6 caractères";
                    require "trucentrer.php";
                }
            }else{//mdp de confirmation différent
                $_GET["reset"] = $_POST["hash"];
                $erreur = "le mot de passe de confirmation est différent";
                $titre = "Entrez votre nouveau mot de passe";
                $form = 3;
                require "trucentrer.php";
            }
        } else { // sinon on demande le mail pour envoyé un lien unique de reset
            $titre = "Modifier votre mdp";
            $form = 0;
            require "trucentrer.php";
        }
        ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>