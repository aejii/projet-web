<?php
session_start();
require('connection.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="script.php" ></script>


    <title>page de profile cookie</title>
</head>
<header>
    <div id="banniere" style="z-index: -1">
        <strong><div class="titleSite"><img id="Ibanniere" src="Images/logoRond.png" />WaifuClicker</div></strong>
    </div>
    <nav>
        <ul id="onglets">
            <?php require "entete.php"; ?>
        </ul>
    </nav>
</header>
<body>

<?php
        if ((isset($_SESSION["pseudo"]))&&(isset($_GET["deco"])))
		{
			session_destroy();
			header('Location: login.php');
        }
        else{
            require "connection.php";
            $req = $bdd->prepare("SELECT id, pseudo, inscription, image, role, coins, nbClic, tempsPasse FROM utilisateurs WHERE id=:id");
            $req->execute(array(
                "id" => $_SESSION["ID"]
            ));
            $donnees = $req->fetch();
            if ($donnees) {
                $pseudo = $donnees['pseudo'];// information static (non modifier en js)
                $imggg = $donnees['image'];
            }
        }
    ?>



<?php
        

        if (isset($_SESSION["pseudo"]))
        {	
            
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
                                require "profil.php";
                            }else{
                                if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST["email"])){
                                    $erreur = "Email invalide";
                                require "profil.php";
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
                                            $uploadUseur = "UPDATE utilisateurs set pseudo = :pseudo , empreinte = :empreinte , image = :image ,0, :ip, :lienvalidation, :email, :resetmdp WHERE id=:id )";
                            

                                            $req = $bdd->prepare($uploadUseur);

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

                    
                                            ?>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 col-md-offset-4">
                                                            <div class="login-panel panel panel-green">
                                                                <div class="panel-heading">
                                                                    <h3 id="temps2" class="panel-title">Modification de votre profil réussi</h3>
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
                    require "profil.php";
                } 
            }
    ?>
    <?php require "script.php"; ?>



    <div class="M1">
        <div class="container-fluid "><br><br>
            <div class="col-xs-2 col-md-5">
                <div class="col-xs-1 col-md-3 " style=" padding-left:0px;">
                    <div style="text-align: left;">
                        <div class="container">
                            <div class="btn-group btn-group-vertical">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">

                                    <img id="playerPFP" src="<?php echo $imggg; ?>" /><br/> <br>
                                         <div class="playerNames"><strong> <?php echo $pseudo; ?></strong></div>
                                        
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-nav  onclick=" javascript:window.location.href='login.php'" ">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <p>Options</p>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                                        <span class="glyphicon glyphicon-globe"></span>
                                        <p>A propos</p>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                                        <span class="glyphicon glyphicon-picture"></span>
                                        <p>Legacy </p>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                                        <span class="glyphicon glyphicon-time"></span>
                                        <p>Statistics</p>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <form  action="" enctype ="multipart/form-data" method = "post" onsubmit="return validateForm()" role="form" class="form-inline col-md-9 go-right" style="color: Green;background-color:#FAFAFF;border-radius:0px 22px 22px 22px; ">
                    <h2>Profile de <?php echo $pseudo; ?></h2>
                        <br>
                        <p>Mettre à jour votre profil pour plus de securité.</p>
                        <br>
                        <div class="form-group">
                            <input id="Firstname" name="Firstname" type="text" class="form-control" style="width:400px;" required>
                            <label for="Firstname">Speudo <span class="glyphicon glyphicon-user"> </span></label>

                        </div>
                        <br><br>
                        <div class="form-group">
                            <input id="pwd" name="Firstname" type="password" class="form-control" style="width:400px;" required>
                            <label for="Firstname">Mot de passe <span class="glyphicon glyphicon-user"> </span></label>

                        </div>
                        <br><br>
                        <div class="form-group">
                            <input id="Firstname" name="Firstname" type="password" class="form-control" style="width:400px;" required>
                            <label for="Firstname">confirmation de mot de passe <span class="glyphicon glyphicon-user"> </span></label>

                        </div>


                        <br><br>
                        <div class="form-group">
                            <input id="Email1" name="phone" class="form-control" style="width:400px;" placeholder="Votre email">
                            <label for="Email1"> email <span class="glyphicon glyphicon-align-envelope"></label>
                        </div>
                        <br><br>

                        <div class="form-group">
                            	Photo de profil : 
                            	<input type ="hidden" name = "MAX_FILE_SIZE" value ="3000000" />
								<input name ="fichier" type ="file" />
                            </div>
                            <br><br>
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Mettre à jour">
                            <?php if(isset($erreur)){ ?>
                                <p>
                                    <div class ="panel panel-red">
                                        <div class ="panel-heading">
                                            <?php echo $erreur ?>
                                        </div>
                                    </div>
                                </p>
                                
                            <?php } ?>
                       
                        <br>
                    </form>
                </div>


            </div>
        </div>
            

    </body>

    </html>