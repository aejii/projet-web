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
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-green">
                            <div class="panel-heading">
                                <h3 id="temps2" class="panel-title">Vous etes deja connecté, redirection dans 5 secondes</h3>
                                <script>
                                    window.setTimeout("location=('index.php');",5000);
                                    var decompte = 5;
                                    var tmp = setInterval(myTimer, 1000);
                                    function myTimer() {
                                        decompte--;
                                        document.getElementById('temps2').innerHTML = 'Vous etes deja connecté, redirection dans '+decompte+' secondes';
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
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
                $hash = hash("sha256", $_POST["email"].time());
                $req = $bdd->prepare("UPDATE utilisateurs SET resetmdp=:resetmdp WHERE email=:email");
                $req->execute(array(
                    "resetmdp" => $hash,
                    "email" => $_POST["email"]
                ));
                // on affiche le lien comme si c'était dans l'email
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="login-panel panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Modifier votre mdp (ceci est un email)</h3>
                                </div>
                                <div class="panel-body">
                                    <a href="mdpoublier.php?reset=<?php echo $hash; ?>" class="active">Ceci est le lien pour réinitialiser votre mdp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="login-panel panel panel-green">
                                    <div class="panel-heading">
                                        <h3 id="temps2" class="panel-title">Email introuvable</h3>
                                        <a href="inscription.php" class="active">Pas de compte ? S'inscrire</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        } else if(isset($_GET["reset"])){//ici on entre le nouveau mdp
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Entrez votre nouveau mot de passe</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form"action="mdpoublier.php" method = "post">
                                    <fieldset>
                                    <input type="hidden" name="hash" value="<?php echo $_GET["reset"] ?>" />
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nouveau mot de passe" name="mdp" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Confirmer nouveau mot de passe" name="cmdp" type="password" value="">
                                    </div>
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Valider">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else if (isset($_POST["hash"]) && isset($_POST["mdp"]) && isset($_POST["cmdp"])) {// ici on modifie le mdp (puis on redirige vers login)
            require "connection.php";
            $req = $bdd->prepare("SELECT resetmdp FROM utilisateurs WHERE resetmdp=:resetmdp");
            $req->execute(array(
            "resetmdp" => $_POST["hash"]
            ));

            // si on trouve le hash alors on modifie le mdp
            $donnees = $req->fetch();
            // email existant
            if ($donnees) {
                $req = $bdd->prepare("UPDATE utilisateurs SET empreinte=:empreinte , resetmdp=:newresetmdp  WHERE resetmdp=:resetmdp");
                $req->execute(array(
                    "empreinte" => hash("sha256", "jaimelesbananes".$_POST["mdp"]),
                    "resetmdp" => $_POST["hash"],
                    "newresetmdp" => ""
                ));
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="login-panel panel panel-green">
                                <div class="panel-heading">
                                    <h3 id="temps2" class="panel-title">Mot de passe modifié avec succès, redirection dans 5 secondes</h3>
                                    <script>
                                        window.setTimeout("location=('login.php');",5000);
                                        var decompte = 5;
                                        var tmp = setInterval(myTimer, 1000);
                                        function myTimer() {
                                            decompte--;
                                            document.getElementById('temps2').innerHTML = 'Mot de passe modifié avec succès, redirection dans '+decompte+' secondes';
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else{
                $titre = "Demande modification mot de passe introuvable";
                $form = 1;
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