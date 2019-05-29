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
            <abbr title=" ~ Votre premiere waifu !"><img class="achievement" src="Images/achFirstLove.png" /></abbr>
            <abbr title="Speedrunner ~ ClickClickClickClickClick 10 Click par secondes"><img class="achievement" src="Images/achSpeedrunner.png" /></abbr>
            <abbr title="Premieres Lueures ~ "><img class="achievement" src="Images/achGotPoint.png" /></abbr>
            <abbr title="Studying Hard ~ Vous avez fait la moitié du chemin"><img class="achievement" src="Images/achStudying.png" /></abbr>
            <abbr title="Elementaliste ~ Puissance maximum."><img class="achievement" src="Images/achElementalist.png" /></abbr>
            <abbr title="Force de la trinité ~ Des tonnes de dégats"><img class="achievement" src="Images/achTriforce.png" /></abbr>
            <abbr title="100% ~ Vous avez obtenu tous les succes !"><img class="achievement" src="Images/ach100.png" /></abbr>
            <abbr title="100% ~ Vous avez atteint 1000 DPS"><img class="achievement" src="Images/emptyAchievement.png" /></abbr>
            <abbr title="100% ~ Vous avez atteint 1M DPS"><img class="achievement" src="Images/emptyAchievement.png" /></abbr>
            <abbr title="100% ~ Vous avez atteint 1B DPS"><img class="achievement" src="Images/emptyAchievement.png" /></abbr>
            <abbr title="100% ~ Vous avez atteint 1T DPS"><img class="achievement" src="Images/emptyAchievement.png" /></abbr>
            <abbr title="100% ~ Vous avez atteint 1Q DPS"><img class="achievement" src="Images/emptyAchievement.png" /></abbr>
            <abbr title="100% ~ You got all achievements !"><img class="secretAchievement" src="Images/achElementalist.png" /></abbr>
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />

        </div>
        <br/>

    </div>

    <div id="upgradePannel">

        <ul id="upgradeOnglets">
            <li class="uplio active"><a data-toggle="tab" href="#upgrades1"><img class="ongletWaifuI" src="Images/logoRond.png" /></a></li>
            <li class="uplio"><a data-toggle="tab" href="#upgrades2"><img class="ongletWaifuI" src="Images/elemSymbol.png" /></a></li>
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
        
            <div id="upgrades2" class="tab-pane fade">    
                <h1 id="waifuT">Elementaliste</h1>
                <div id="elem">
                    <img class="elemImage" src="Images/LightLux.png" /><br/>
                    <div class="waifuName"> Luxanna </div>Lv.1<br/>
                    DPS: 0 (Suivant : +1019)<br/>
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 3340 <img id="tinyHeart" src="Images/heart.png"/>
                </div>

                <br/>
                <h2 id="waifuT">Auras</h2>

                <div class="aura">
                    <img class="iconImage" src="Images/iconNature.png" /><div class="waifuName"> Aura naturelle : Récolte </div><br/>
                    Effet : Augmente toutes les sources de dégats de 5%<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconWater.png" /><div class="waifuName"> Aura d'eau : Flux constant</div><br/>
                    Effet : Clic automatiquement toute les deux secondes<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconAir.png" /><div class="waifuName"> Aura de vent : Vent arrière</div><br/>
                    Effet : Diminue le coût du batiment le plus cher de 10%<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconFire.png" /><div class="waifuName"> Aura de feu : Poings </div><br/>
                    Effet : Augmente les dégats de clics de 15%<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <!--<br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconMystic.png" /><div class="waifuName"> Aura mystique : </div><br/>
                    Effet : <br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconStorm.png" /><div class="waifuName"> Aura de foudre : Chaîne d'éclairs </div><br/>
                    Effet : <br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconIce.png" /><div class="waifuName"> Aura givrante : </div><br/>
                    Effet :<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>
                <div class="aura">
                    <img class="iconImage" src="Images/iconMagma.png" /><div class="waifuName"> Aura de magma : Furie </div><br/>
                    Effet : En l'abscence de clic, stock de la furie augmentant énormément les dégats d'un prochain clic<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> <button type="button" class="btn btn-lvlup">Choisir cette aura</button>
                </div>
                <br/>-->
                <div class="aura">
                    <img class="iconImage" src="Images/iconLight.png" /><div class="waifuName"> True Light Aura : Prism </div><br/>
                    Effet : Vous pouvez choisir 2 auras simultanément<br/>
                    <button type="button" class="btn btn-lvlup">Débloquer</button> 
                </div>
            </div>
        
        
            <div id="upgrades3" class="tab-pane fade">    
            <h1 id="waifuT">Research Lab</h1>
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
                <!--<div class="research">
                    <h1 id="waifuT">Usine a sorts</h1>
                    <img class="iconImage" src="Images/resSpell.jpg" /><div class="waifuName"> Optimisation des clics </div><div class="upgLevel">Lv.1</div><br/>
                    Effet : Produit diverses sorts aléatoirement a utiliser<br/>
                    10 min entre chaque sort<br/>
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 1M <img id="tinyHeart" src="Images/heart.png"/>
                </div>-->
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

</body>

</html>
