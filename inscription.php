<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    
    <title>Inscription</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="styleLogin.css" rel="stylesheet">

</head>

<body>
    <?php
        // include_once('Statistiques.class.php');
        require('connection.php');
        // $stats = new Statistiques();
        function getRealIpAddr()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
            {
              $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
            {
              $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
              $ip=$_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }

        if (isset($_SESSION["pseudo"]))
        {	
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
        }
        else
            {
                if ((isset($_POST["pseudo"]))&&(isset($_POST["mdp"]))&&(isset($_POST["cmdp"]))) {
                    //vérification formulaire inscription
                    if (strlen($_POST["pseudo"])>=4 && strlen($_POST["pseudo"])<=100) {
                        if (ctype_alnum($_POST["pseudo"]) ) {//chaine alphanumérique
                            //requete vérif utilisateur deja créer
                            $req = $bdd->prepare($wherepseudo);
                            $req->execute(array(
                            "pseudo" => $_POST["pseudo"]
                            ));

                            $donnees = $req->fetch();
                            if ($donnees) {
                                $erreur = "désolé votre pseudo existe deja";
                                require "formulaireinscription.php";
                            }else{
                                if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST["email"])){
                                    $erreur = "Email invalide";
                                require "formulaireinscription.php";
                                }else{
                                    //mddp et confirmation mdp equal
                                    if ($_POST["mdp"] == $_POST["cmdp"]) {
                                        if (strlen($_POST["mdp"])>=7) {
                                            
                                            $chemin = __DIR__."/Images/defaut.png";
                                            $cheminRel = "./Images/defaut.png";
                                            try
                                            {
                                                $ext = pathinfo($_FILES["fichier"]["name"], PATHINFO_EXTENSION);
                                                $chemin = __DIR__."/Images/".$_POST["pseudo"].".".$ext;
                                                $cheminRel = "./Images/".$_POST["pseudo"].".".$ext;
                                                if (!move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin))
                                                {
                                                    $chemin = __DIR__."/Images/defaut.png";
                                                    $cheminRel = "./Images/defaut.png";
                                                }
                                            }
                                            catch (Exception $e)
                                            {
                                                $chemin = __DIR__."/Images/defaut.png";
                                                $cheminRel = "./Images/defaut.png";
                                            }
                                            $date = new DateTime();
                                            $validation = hash("sha512", "jaimelesbananes".$_POST["pseudo"].$date->getTimestamp());
                                            $creationutilisateur = "INSERT INTO utilisateurs (`pseudo`,`empreinte`,`inscription`,`image`,`role` , `ipinscription`, `lienvalidation`, `email`, `resetmdp`) VALUES (:pseudo , :empreinte , :insciption , :image ,0, :ip, :lienvalidation, :email, :resetmdp )";
                                            $req = $bdd->prepare($creationutilisateur);
                                            $req->execute(array(
                                            "pseudo" => $_POST["pseudo"],
                                            "empreinte" => hash("sha512", "jaimelesbananes".$_POST["mdp"]),
                                            "insciption" => $date->getTimestamp(),
                                            "image" => $cheminRel,
                                            "ip" => getRealIpAddr(),
                                            "lienvalidation" => $validation, 
                                            "email" => $_POST["email"],
                                            "resetmdp" => ""
                                            ));

                                            $req = $bdd->prepare("SELECT ID FROM utilisateurs WHERE pseudo=:pseudo AND empreinte=:empreinte");
                                            $req->execute(array(
                                            "pseudo" => $_POST["pseudo"],
                                            "empreinte" => hash("sha512", "jaimelesbananes".$_POST["mdp"])
                                            ));
                                            $donnees = $req->fetch();
                                            $idjoueur = $donnees['ID'];

                                            $req = $bdd->prepare("select idAmel from amelioration");
                                            $req->execute();
                                            while ($donnees = $req->fetch()){
                                                $req2 = $bdd->prepare("INSERT INTO joueuramel (`idjoueur`,`idAmel`,`level`) VALUES (:idjoueur,:idAmel,0)");
                                                $req2->execute(array(
                                                    "idjoueur" => $idjoueur,
                                                    "idAmel" => $donnees['idAmel']
                                                ));
                                            }
                                            ?>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 col-md-offset-4">
                                                            <div class="login-panel panel panel-green">
                                                                <div class="panel-heading">
                                                                    <h3 id="temps2" class="panel-title">Inscription réussite, veuillez valider votre email (clicker sur le lien ci dessous pour l'instant)</h3>
                                                                    <a href="validercompte.php?validation=<?php echo $validation ?>" class="active">ici</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }else{
                                            $erreur = "votre mdp doit contenir plus de 6 caractères";
                                            require "formulaireinscription.php";
                                        }
                                    }else{
                                        $erreur = "le mot de passe de confirmation est différent";
                                        require "formulaireinscription.php";
                                    }
                                }
                            }
                        }else{
                            $erreur = "votre pseudo doit contenir seulement des caractères alphanumérique";
                            require "formulaireinscription.php";
                        }
                        
                    }else{
                        $erreur = "votre pseudo doit contenir entre 4 et 100 caractères";
                        require "formulaireinscription.php";
                    }
                    
                }else{//inscription normal
                    require "formulaireinscription.php";
                } 
            }
    ?>
    <?php require "script.php"; ?>
</body>

</html>
