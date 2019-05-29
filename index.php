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
    ?>    
    <div id="infos">
        <div id="player">
            <img id="playerPFP" src="Images/waifuLux.jpg" /><br/>
            <div class="playerName"><strong> Reshi</strong></div>
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
                <div id="autoclick1" id="autoclick" class="waifu">
                    <img class="iconImage" src="Images/AYAYA.png" /><div class="waifuName"> Karen Kujo </div><div class="upgLevel">Lv.1</div>
                    <div class="damages">DPS: 0 (Suivant : +10)</div><br/>
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 100 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick2" class="waifu">
                    <img class="iconImage" src="Images/waifuKaori.png" /><div class="waifuName"> Kaori Miyazono </div><div class="upgLevel">Lv.1</div>
                    <div class="damages">DPS: 0 (Suivant : +100)</div>
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 700 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick3" class="waifu">
                    <img class="iconImage" src="Images/waifuNakano.png" /><div class="waifuName"> Nakano Miku </div><div class="upgLevel">Lv.1</div>
                    <div class="damages">DPS: 0 (Suivant : +500)</div>
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 2000 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick4" class="waifu">
                    <img class="iconImage" src="Images/waifuErina.png" /><div class="waifuName"> Erina </div><div class="upgLevel">Lv.1</div>
                    <div class="damages">DPS: 0 (Suivant : +1000)</div>
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 10k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick5" class="waifu">
                    <img class="iconImage" src="Images/waifuChitoge.png" /><div class="waifuName"> Chitoge Kirisaki </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +5000)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 40k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick6" class="waifu">
                    <img class="iconImage" src="Images/waifuHikayu.jpg" /><div class="waifuName"> Hikayu </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +15k)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 150k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick7" class="waifu">
                    <img class="iconImage" src="Images/waifuTsugumi.png" /><div class="waifuName"> Tsugumi </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +50k)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 550k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick8" class="waifu">
                    <img class="iconImage" src="Images/waifuFjorm.png" /><div class="waifuName"> Fjorm </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +250k)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 1M 1 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick9" class="waifu">
                    <img class="iconImage" src="Images/waifuAsuna.png" /><div class="waifuName"> Asuna </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +1M)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 3M 4 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick10" class="waifu">
                    <img class="iconImage" src="Images/waifuAlice.png" /><div class="waifuName"> Alice </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +3M)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 10M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick11" class="waifu">
                    <img class="iconImage" src="Images/waifuLyn.png" /><div class="waifuName"> Lyn </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +10M)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 42M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick12" class="waifu">
                    <img class="iconImage" src="Images/waifuCynthia1.png" /><div class="waifuName"> Cynthia </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +100M)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 153M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick13" class="waifu">
                    <img class="iconImage" src="Images/waifuHomura.png" /><div class="waifuName"> Homura Akemi </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +300M)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 800M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick14" class="waifu">
                    <img class="iconImage" src="Images/waifuRemRam.png" /><div class="waifuName"> Rem&Ram </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +1B)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 3B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick15" class="waifu">
                    <img class="iconImage" src="Images/waifuFuwa.png" /><div class="waifuName"> Fuwa Aika </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +10B)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 25B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick16" class="waifu">
                    <img class="iconImage" src="Images/waifuTheresia.png" /><div class="waifuName"> Theresia Van Astrea </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +50B)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 100B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick17" class="waifu">
                    <img class="iconImage" src="Images/waifuYurika.png" /><div class="waifuName"> Yurika Nijino </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +500B)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 777B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick18" class="waifu">
                    <img class="iconImage" src="Images/waifuEmilia.png" /><div class="waifuName"> Emilia </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +3T)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 6T <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick19" class="waifu">
                    <img class="iconImage" src="Images/waifuTohru.png" /><div class="waifuName"> Tohru </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +30T)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 34T 5 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
                <div id="autoclick20" class="waifu">
                    <img class="iconImage" src="Images/waifuMegumin.png" /><div class="waifuName"> Megumin </div><div class="upgLevel">Lv.1</div> 
                    <div class="damages">DPS: 0 (Suivant : +200T)</div> 
                    <button type="button" class="btn btn-lvlup">NIVEAU SUP. !</button> Coût : 99T 999 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
                </div>
                <br/>
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
