<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>WaifuClicker</title>
</head>

<header>
    <div id="banniere" style="z-index: -1">
        <img id="Ibanniere" src="Images/logoRond.png" />
        <strong><div class="titleSite">WaifuClicker</div></strong>
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

        <div id="scores">
            <!-- <score><strong>Click Damage : </strong><br/>Lv159 ~ 48773</score><button type="button" class="btn btn-upgrade"><img id="upgradeArrow" src="Images/upgradeArrow.png" /></button> cost:296k <img id="tinyHeart" src="Images/heart.png"/><br/>
            <score><strong><abbr title="Your clics will inflict bonus damages, in proportion to total Waifu DPS ">Waifu link</abbr> :</strong><br/>Lv5 ~ 5% </score> <button type="button" class="btn btn-upgrade"><img id="upgradeArrow" src="Images/upgradeArrow.png" /></button> cost:1M <img id="tinyHeart" src="Images/heart.png"/><br/> -->
            <div class="score"><strong>Total Dps : </strong>2M 487</div><br/>
            <div class="score"><strong>Total level : </strong>185</div><br/>
            <div class="score"><strong>Upgrades unlucked : </strong>6/20</div><br/>
            <div class="score"><strong>Time played : </strong>483h 42m</div><br/>
        </div>

        <div id="achievements">
            <h1 id="achiTitle">Achievements</h1>
            <abbr title="First Love ~ You got your first waifu !"><img class="achievement" src="Images/achFirstLove.png" /></abbr>
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <abbr title="Speedrunner ~ ClickClickClickClickClick 10 CPS"><img class="achievement" src="Images/achSpeedrunner.png" /></abbr>
            <abbr title="You got the point ;) ~ Keep levelling her, for you own sake."><img class="achievement" src="Images/achGotPoint.png" /></abbr>
            <abbr title="Studying Hard ~ You did half of the way !"><img class="achievement" src="Images/achStudying.png" /></abbr>
            <abbr title="Elementalist ~ You reached your maximum powers."><img class="achievement" src="Images/achElementalist.png" /></abbr>
            <abbr title="TriLuxxy force ~ Lux dealt tons of damages !"><img class="achievement" src="Images/achTriforce.png" /></abbr>
            <abbr title="100% ~ You got all achievements !"><img class="achievement" src="Images/ach100.png" /></abbr>
            <abbr title="100% ~ You got all achievements !"><img class="secretAchievement" src="Images/achElementalist.png" /></abbr>
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />
            <img class="achievement" src="Images/emptyAchievement.png" />

        </div>
    
    </div>

    <div id="upgradePannel">
        
        <ul id="upgradeOnglets">
                <li class="uplio"><a href="#"><img class="ongletWaifuI" src="Images/logoRond.png" /></a></li>
                <li class="uplio"><a href="#"><img class="ongletWaifuI" src="Images/elemSymbol.png" /></a></li>          
                <li class="uplio"><a href="#"><img class="ongletWaifuI" src="Images/researchLabSymbol.png" /></a></li>
        </ul>
        <br/>   
        <div id="upgrades1" class="tab-pane fade in active">
           <h1 id="waifuT">Waifus</h1>
           <div id="waifu">
               <img class="waifuImage" src="Images/AYAYA.png" /><div class="waifuName"> Karen Kujo </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="meter">
                <span style="width: 25%"></span>
                </div>
                <div class="damages">DPS: 0 (Next +1)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 100 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuKaori.png" /><div class="waifuName"> Kaori Miyazono </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="damages">DPS: 0 (Next +100)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 700 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuNakano.png" /><div class="waifuName"> Nakano Miku </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="damages">DPS: 0 (Next +500)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 2000 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuErina.png" /><div class="waifuName"> Erina </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="damages">DPS: 0 (Next +1000)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 10k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuChitoge.png" /><div class="waifuName"> Chitoge Kirisaki </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="damages">DPS: 0 (Next +5000)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 40k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuHikayu.jpg" /><div class="waifuName"> Hikayu </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="damages">DPS: 0 (Next +15k)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 150k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
                <img class="waifuImage" src="Images/waifuTsugumi.png" /><div class="waifuName"> Tsugumi </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +50k)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 550k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuFjorm.png" /><div class="waifuName"> Fjorm </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +250k)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 1M 1 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuAsuna.png" /><div class="waifuName"> Asuna </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1M)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 3M 4 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuAlice.png" /><div class="waifuName"> Alice </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +3M)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 10M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
               <img class="waifuImage" src="Images/waifuLyn.png" /><div class="waifuName"> Lyn </div><div class="waifuLevel">Lv.1</div><br/>
               <div class="damages">DPS: 0 (Next +10M)</div><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 42M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuCynthia1.png" /><div class="waifuName"> Cynthia </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +100M)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 153M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuHomura.png" /><div class="waifuName"> Homura Akemi </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 800M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuRemRam.png" /><div class="waifuName"> Rem&Ram </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 3B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuFuwa.png" /><div class="waifuName"> Fuwa Aika </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +50M)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 25B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuTheresia.png" /><div class="waifuName"> Theresia Van Astrea </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 100B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuYurika.png" /><div class="waifuName"> Yurika Nijino </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 777B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuEmilia.png" /><div class="waifuName"> Emilia </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 6T <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuTohru.png" /><div class="waifuName"> Tohru </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 34T 5 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuMegumin.png" /><div class="waifuName"> Megumin </div><div class="waifuLevel">Lv.1</div><br/>
                <div class="damages">DPS: 0 (Next +1B)</div><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 99T 999 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
        </div>

        <div id="upgrades2" class="tab-pane fade in active">    
            <h1 id="waifuT">Elementalist</h1>
            <div id="elem">
                <img class="elemImage" src="Images/LightLux.png" /><br/>
                <div class="waifuName"> Luxanna </div>Lv.1<br/>
                DPS: 0 (Next +10)<br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 1019 <img id="tinyHeart" src="Images/heart.png"/>
            </div>

            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconNature.png" /><div class="waifuName"> Nature Aura : Harvest </div><br/>
                Effect : Boost all your total DPS by 5%<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconWater.png" /><div class="waifuName"> Water Aura :  </div><br/>
                Effect : <br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconAir.png" /><div class="waifuName"> Air Aura :  </div><br/>
                Effect : <br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconFire.png" /><div class="waifuName"> Fire Aura : Punch </div><br/>
                Effect : Boost your click damages by 15%<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconMystic.png" /><div class="waifuName"> Mystic Aura : Spell Brewer </div><br/>
                Effect : Your spell factory produces spells 20% faster and their effects are 20% longer<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconStorm.png" /><div class="waifuName"> Storm Aura : Lightning Bolt </div><br/>
                Effect : If you click more than 10 times per seconds, one more click is generated every 2 clicks<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconIce.png" /><div class="waifuName"> Ice Aura : </div><br/>
                Effect :<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconMagma.png" /><div class="waifuName"> Magma Aura : Fury </div><br/>
                Effect : When you don't click, generate Fury which will greatly increase Next click damage<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> <button type="button" class="btn btn-lvlup">Choose this aura</button>
            </div>
            <br/>
            <div id="aura">
                <img class="waifuImage" src="Images/iconLight.png" /><div class="waifuName"> True Light Aura : Prism </div><br/>
                Effect : You can now chose 2 auras at once<br/>
                <button type="button" class="btn btn-lvlup">Unlock</button> 
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

    </div>

    <div id="center">
        <div class="hearts">0 <img id="heart" src="Images/heart.png"/></div>
        <img id="clicMe" class="pulse" src="Images/clicMe.png" />
    </div>
    <?php
        }
    ?>
</body>

</html>