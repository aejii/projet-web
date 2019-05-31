<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>WaifuClicker</title>
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css" />

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="script.js" ></script>
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
            $req = $bdd->prepare("SELECT id, pseudo, inscription, image, role, coins, nbClic, tempsPasse, ennemiestuees FROM utilisateurs WHERE id=:id");
            $req->execute(array(
                "id" => $_SESSION["ID"]
            ));
            $donnees = $req->fetch();
            if ($donnees) {
                $pseudo = $donnees['pseudo'];// information static (non modifier en js)
                $imggg = $donnees['image'];
            }
    ?>

    <div class="row">
        <div id="infos">
            <div id="player">
                <img id="playerPFP" src="<?php echo $imggg; ?>" /><br/>
                <div class="playerName"><strong> <?php echo $pseudo; ?></strong></div>
            </div>

            <div id="scores"><div class="score"><strong>Dps Total : </strong>0</div>
                <div class="score"><strong>Dégats par clic : </strong>1</div>
                <div class="score"><strong>Niveau global : </strong>0</div>
                <div class="score"><strong>Améliorations débloquées : </strong>0/20</div>
                <div class="score"><strong>Temps de jeu : </strong>10m</div>
            </div>

            <div id="achievements">
                <h1 id="achiTitle">Succès</h1>
								<?php
										$req = $bdd->prepare("SELECT idAchiev, nom, type, nbdeblocage, img FROM achievement");
										$req->execute();
										$donnees = $req->fetch();
										while ($donnees = $req->fetch()){
												?>
														<abbr id="achiev<?php echo $donnees['idAchiev']; ?>" title="<?php echo $donnees['nom']; ?>">
															<img class="achievement" src="<?php echo $donnees['img']; ?>" />
														</abbr>
												<?php
										}
								?>

            </div>
            <br/>

        </div>

        <div id="upgradePannel">

            <ul id="upgradeOnglets">
                <li class="uplio active"><a data-toggle="tab" href="#upgrades1"><img class="ongletWaifuI" src="Images/logoRond.png" /></a></li>
                <li class="uplio"><a data-toggle="tab" href="#upgrades3"><img class="ongletWaifuI" src="Images/researchLabSymbol.png" /></a></li>
            </ul>

            <div class="tab-content">
                <div id="upgrades1" class="tab-pane fade in active">
                    <h1  class="waifuT">Waifus</h1>
                    <?php
                        $req = $bdd->prepare("SELECT idAmel, nom, baseDamage, coinsforlvlup, coinsforunlock, imageLink FROM amelioration");
                        $req->execute();
                        $donnees = $req->fetch();
                        while ($donnees = $req->fetch()){
                            ?>
                                <div id="autoclick<?php echo $donnees['idAmel']; ?>" class="waifu">
                                    <img class="iconImage" src="<?php echo $donnees['imageLink']; ?>" /><div class="waifuName"> <?php echo $donnees['nom']; ?> </div><div class="upgLevel">Lv.1</div>
                                    <div class="damages">DPS: 0 (Suivant : +<?php echo $donnees['baseDamage']; ?>)</div><br/>
                                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : <?php echo $donnees['coinsforlvlup']; ?> <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                                </div>
                                <br/>
                            <?php
                        }
                    ?>
                </div>




                <div id="upgrades3" class="tab-pane fade">
                <h1 id="waifuT">Labo de recherche</h1>
                    <div class="research">
                        <img class="iconImage" src="Images/resClic.jpg" /><div class="waifuName"> Optimisation des clics </div><div class="upgLevel">Lv.1</div><br/>
                        Effet : Augmente les dégats des clics.<br/>
                        +1 dégat(s) par clic<br/>
                        <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 1000 <img id="tinyHeart" src="Images/heart.png"/>
                    </div>
                    <br/>
                    <div class="research">
                        <img class="iconImage" src="Images/resLink.jpg" /><div class="waifuName"> Lien </div><div class="upgLevel">Lv.1</div><br/>
                        Effet : Augmente les dégats des clics proportionelement au DPS total des Waifus.<br/>
                        +1% du DPS<br/>
                        <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 10k <img id="tinyHeart" src="Images/heart.png"/>
                    </div>
                    <br/>
                    <div class="research">
                        <img class="iconImage" src="Images/resTrainer.png" /><div class="waifuName"> Entraîneur </div><div class="upgLevel">Lv.1</div><br/>
                        Effet : Augmente periodiquement le niveau d'une Waifu <br/>
                        10 min entre chaque amélioration<br/>
                        <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 1M <img id="tinyHeart" src="Images/heart.png"/>
                    </div>
                    <br/>
                </div>

            </div>

        </div>

        <div id="center">
            <span class="hearts" id="score">0</span><img id="heart" src="Images/heart.png"/>
            <img onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status='..message perso .. '; return true;" id="clicMe" class="pulse" src="Images/logoRond.png" onclick="hit()" />
        </div>
        <?php
            }
        ?>
    <div>
</body>

</html>
