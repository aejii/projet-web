<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">     -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
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
                            <div class="panel-body">
                                <a href="index.php" class="active">Lien manuel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
            //On se connecte à la base de données et on vérifie les informations
            //Si l'authentification est OK, on créé les variables de session ID et pseudo en leur assignant l'id de l'utilisateur et son pseudo
            require "connection.php" ;
            //Sinon, on affiche un message d'erreur suivi du formulaire d'authentification
            $req = $bdd->prepare("SELECT ID, role FROM utilisateurs WHERE pseudo=:pseudo AND empreinte=:empreinte");
            $req->execute(array(
            "pseudo" => $_POST["pseudo"],
            "empreinte" => hash("sha512", "jaimelesbananes".$_POST["mdp"])
            ));

            //while ( $donnees = $req->fetch() )
            $donnees = $req->fetch();
            if ($donnees) {
                if ($donnees['role'] == 0){
                    $titre = "Compte non valider, veuillez vérifier votre boite mail";
                    $form = 8;
                    require "trucentrer.php";
                }else{
                    $_SESSION['pseudo'] = $_POST["pseudo"];
                    $_SESSION["ID"] = $donnees['ID'];
                    ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="login-panel panel panel-green">
                                        <div class="panel-heading">
                                            <h3 id="temps" class="panel-title">Connexion réussite, redirection dans 5 secondes</h3>
                                            <script>
                                                window.setTimeout("location=('index.php');",5000);
                                                var decompte = 5;
                                                var tmp = setInterval(myTimer, 1000);
                                                function myTimer() {
                                                    decompte--;
                                                    document.getElementById('temps').innerHTML = 'Connexion réussite, redirection dans '+decompte+' secondes';
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }else{
                $erreur = "mdp incorrect";
                require "formulaireconnexion.php" ;
            }
        } else {
            //echo hash("sha512", "cc");
            require "formulaireconnexion.php";
        }
    ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
</body>

</html>
