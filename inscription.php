<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    
    <title>Inscription</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet">

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

        if ((isset($_SESSION["pseudo"]))&&(isset($_GET["deco"])))
        {
            session_destroy();
            header('Location: index.php');
        }
        else if (isset($_SESSION["pseudo"]))
        {	
            header('Location: index.php');
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
                                echo "désolé votre pseudo existe deja";
                                require "formulaireinscription.php";
                            }else{
                                if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST["email"])){
                                    echo "erreur email invalide";
                                }else{
                                    //mddp et confirmation mdp equal
                                    if ($_POST["mdp"] == $_POST["cmdp"]) {
                                        if (strlen($_POST["mdp"])>=2) {//6
                                            
                                            $chemin = __DIR__."/Images/defaut.png";
                                            $cheminRel = "./Images/defaut.png";
                                            try
                                            {
                                                $ext = pathinfo($_FILES["fichier"]["name"], PATHINFO_EXTENSION);
                                                $chemin = __DIR__."/Uploads/".$_POST["pseudo"].".".$ext;
                                                $cheminRel = "./Uploads/".$_POST["pseudo"].".".$ext;
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
                                            $req = $bdd->prepare($creationuser);
                                            $req->execute(array(
                                            "pseudo" => $_POST["pseudo"],
                                            "empreinte" => hash("sha256", "jaimelesbananes".$_POST["mdp"]),
                                            "insciption" => $date->getTimestamp(),
                                            "image" => $cheminRel,
                                            "ip" => getRealIpAddr(),
                                            "lienvalidation" => hash("sha256", "jaimelesbananes".$_POST["pseudo"]), 
                                            "email" => $_POST["email"],
                                            "resetmdp" => ""
                                            ));

                                            echo "inscription réussite. redirection dans 5 secondes";
                                            header('Refresh: 5; URL=login.php');
                                        }else{
                                            echo "votre mdp doit contenir plus de 6 caractères";
                                            require "formulaireinscription.php";
                                        }
                                    }else{
                                        echo "le mot de passe de confirmation est différent";
                                        require "formulaireinscription.php";
                                    }
                                }
                            }
                        }else{
                            echo "votre pseudo doit contenir seulement des caractères alphanumérique";
                            require "formulaireinscription.php";
                        }
                        
                    }else{
                        echo "votre pseudo doit contenir entre 4 et 100 caractères";
                        require "formulaireinscription.php";
                    }
                    
                }else{//inscription normal
                    require "formulaireinscription.php";
                }
                
                //echo hash("sha256", "jaimelesbananes"."pierre");  
            }
    ?>
    <?php require "script.php"; ?>
</body>

</html>
