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
        
        if (!isset($_SESSION['connecte'])) {
            //ok
        
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Se connecter</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"action="login.php" method = "post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="login" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" name="mdp" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Valider">
                                <a href="mdpoublier.php" class="active">Mots de passe oublié ?</a>
                                <div class="form-group">
                                    <a href="inscription.php" class="active">Pas de compte ? S'inscrire</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>

    <?php
        } else {
            //echo hash("sha512", "jaimelesbananes"."supersayan"."jaimelesbananes");
            // header('Location: aejii.php');
        }
    ?>
</body>

</html>
