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
        <strong><titleSite>WaifuClicker</titleSite></strong>
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
            <img id="playerPFP" src="Images/waifuLux.jpg" /><playerName><strong> Reshi</strong></playerName>
        </div>

        <div id="scores">
            <score><strong>Click Damage : </strong><br/>Lv159 ~ 48773</score><button type="button" class="btn btn-upgrade"><img id="upgradeArrow" src="Images/upgradeArrow.png" /></button> cost:296k <img id="tinyHeart" src="Images/heart.png"/><br/>
            <score><strong><abbr title="Your clics will inflict bonus damages, in proportion to total Waifu DPS ">Waifu link</abbr> :</strong><br/>Lv5 ~ 5% </score> <button type="button" class="btn btn-upgrade"><img id="upgradeArrow" src="Images/upgradeArrow.png" /></button> cost:1M <img id="tinyHeart" src="Images/heart.png"/><br/>
            <score><strong>Total Dps : </strong>2487574</score><br/>
            <score><strong>Waifu level : </strong>185</score><br/>
            <score><strong>Waifus unlucked : </strong>6/20</score><br/>
            <score><strong>Time played : </strong>483h 42m</score><br/>
        </div>

        <div id="achievments">
            <h1 id="achiTitle">Achievments</h1>
            <abbr title="First Love ~ You got your first waifu !"><img class="achievment" src="Images/achFirstLove.png" /></abbr>
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <img class="achievment" src="Images/emptyAchievment.png" />
            <abbr title="Speedrunner ~ ClickClickClickClickClick 10 CPS"><img class="achievment" src="Images/achSpeedrunner.png" /></abbr>
            <abbr title="You got the point ;) ~ Keep levelling her, for you own sake."><img class="achievment" src="Images/achGotPoint.png" /></abbr>
            <abbr title="Studying Hard ~ You did half of the way !"><img class="achievment" src="Images/achStudying.png" /></abbr>
            <abbr title="Elementalist ~ You reached your maximum powers."><img class="achievment" src="Images/achElementalist.png" /></abbr>
            <abbr title="TriLuxxy force ~ Lux dealt tons of damages !"><img class="achievment" src="Images/achElementalist.png" /></abbr>
            <abbr title="100% ~ You got all achievments !"><img class="achievment" src="Images/achElementalist.png" /></abbr>
            <abbr title="100% ~ You got all achievments !"><img class="secretAchievment" src="Images/achElementalist.png" /></abbr>

        </div>
    
    </div>

    <div id="waifusPannel">
        <nav>
                <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class=""><a href="#home" data-toggle="tab" aria-expanded="false">Home</a>
                            </li>
                            <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Profile</a>
                            </li>
                            <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Messages</a>
                            </li>
                            <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade" id="home">
                                <h4>Home Tab</h4>
                                <p>The Goddess, Auras</p>
                            </div>
                            <div class="tab-pane fade active in" id="profile">
                                <h4>Profile Tab</h4>
                                <p>Waifus</p>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h4>Messages Tab</h4>
                                <p>Trainer,Link,Spell Factory</p>
                            </div>
                        </div>
                    </div>

            <ul id="upgradeOnglets">
                <li class="uplio"><a href="main.html">Luxanna</a></li>          
                <li class="uplio"><a href="profile.html">Waifus</a></li>
                <li class="uplio"><a href="main.html">Research lab</a></li>
            </ul>
        </nav>
        <div id="waifu">
            <img class="waifuImage" src="Images/waifuLux.jpg" /><waifuName> Luxanna </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
            <damages>DPS: 0 (Next +10)</damages><br/>
            <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 1019 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
        </div>
        <br/>   
           <h1 id="waifuT">Waifus</h1>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuMegumi.png" /><waifuName> Megumi Kato </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +1)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 100 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuKaori.png" /><waifuName> Kaori Miyazono </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +100)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 700 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuNakano.png" /><waifuName> Nakano Miku </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +500)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 2000 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuErina.png" /><waifuName> Erina </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +1000)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 10k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuChitoge.png" /><waifuName> Chitoge Kirisaki </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +5000)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 40k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
               <img class="waifuImage" src="Images/waifuHikayu.jpg" /><waifuName> Hikayu </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +15k)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 150k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
           <div id="waifu">
                <img class="waifuImage" src="Images/waifuTsugumi.png" /><waifuName> Tsugumi </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +50k)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 550k <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuFjorm.png" /><waifuName> Fjorm </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +250k)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 1M 1 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuAsuna.png" /><waifuName> Asuna </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1M)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 3M 4 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuAlice.png" /><waifuName> Alice </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +3M)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 10M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
               <img class="waifuImage" src="Images/waifuLyn.png" /><waifuName> Lyn </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
               <damages>DPS: 0 (Next +10M)</damages><br/>
               <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 42M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
           </div>
           <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuCynthia1.png" /><waifuName> Cynthia </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +100M)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 153M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuHomura.png" /><waifuName> Homura Akemi </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 800M <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuRemRam.png" /><waifuName> Rem&Ram </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 3B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuFuwa.png" /><waifuName> Fuwa Aika </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +50M)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 25B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuTheresia.png" /><waifuName> Theresia Van Astrea </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 100B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuYurika.png" /><waifuName> Yurika Nijino </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 777B <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuEmilia.png" /><waifuName> Emilia </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 6T <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuTohru.png" /><waifuName> Tohru </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 34T 5 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
            <div id="waifu">
                <img class="waifuImage" src="Images/waifuMegumin.png" /><waifuName> Megumin </waifuName><waifuLevel>Lv.1</waifuLevel><br/>
                <damages>DPS: 0 (Next +1B)</damages><br/>
                <button type="button" class="btn btn-lvlup">LEVEL UP !</button> Cost : 99T 999 <img id="tinyHeart" src="Images/heart.png"/> <button type="button" class="btn btn-lvlup">x10</button>
            </div>
            <br/>
    </div>

    <div id="center">
        <hearts>5624 </hearts><img id="heart" src="Images/heart.png"/>
        <img id="clicMe" class="pulse" src="Images/clicMe.png" />
    </div>
    <?php
        }
    ?>
</body>

</html>