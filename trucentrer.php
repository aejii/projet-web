<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 id="temps2" class="panel-title"><?php echo $titre ?></h3>
                </div>
                <div class="panel-body">
                <?php
                    switch ($form) {
                        case 0:
                        ?>
                        <form role="form"action="mdpoublier.php" method = "post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Votre adresse email" name="email" autofocus>
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Valider">
                                <a href="login.php" class="active">Se connecter</a>
                                <div class="form-group">
                                    <a href="inscription.php" class="active">Pas de compte ? S'inscrire</a>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                            break;
                        case 1:
                            ?>
                            <a href="inscription.php" class="active">Pas de compte ? S'inscrire</a>
                            <a href="login.php" class="active">Se connecter</a>
                            <?php
                            break;
                        case 2:
                            ?>
                            <a href="login.php" class="active">Lien manuel</a>
                            <script>
                                window.setTimeout("location=('login.php');",5000);
                                var decompte = 5;
                                var tmp = setInterval(myTimer, 1000);
                                function myTimer() {
                                    decompte--;
                                    document.getElementById('temps2').innerHTML = 'Mot de passe modifié avec succès, redirection dans '+decompte+' secondes';
                                }
                            </script>
                            <?php
                            break;
                        case 3:
                            ?>
                            <form name="inscriptform" role="form"action="mdpoublier.php" method = "post" onsubmit="return validateForm()">
                                <fieldset>
                                <input type="hidden" name="hash" value="<?php echo $_GET["reset"] ?>" />
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nouveau mot de passe" name="mdp" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirmer nouveau mot de passe" name="cmdp" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Valider">
                                <?php if(isset($erreur)){ ?>
                                    <p>
                                        <div class ="panel panel-red">
                                            <div class ="panel-heading">
                                                <?php echo $erreur ?>
                                            </div>
                                        </div>
                                    </p>
                                    
                                <?php } ?>
                                </fieldset>
                            </form>
                            <script>
                                function validateForm() {
                                    var y = document.forms["inscriptform"]["mdp"].value;
                                    var z = document.forms["inscriptform"]["cmdp"].value;
                                    if (y.length <= 8) {
                                        alert("Votre mot de passe doit possèder au moins 8 caractères");
                                        return false;
                                    }
                                    if (y != z) {
                                        alert("Votre mot de passe de confirmation est faux :O");
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                            <?php
                            break;
                        case 4:
                            ?>
                            <a href="inscription.php" class="active">Pas de compte ? S'inscrire</a>
                            <?php
                            break;
                        case 5:
                            ?>
                            <a href="mdpoublier.php?reset=<?php echo $hash; ?>" class="active">Ceci est le lien pour réinitialiser votre mdp</a>
                            <?php
                            break;
                        case 6:
                            ?>
                            <a href="index.php" class="active">Lien manuel</a>
                            <script>
                                window.setTimeout("location=('index.php');",5000);
                                var decompte = 5;
                                var tmp = setInterval(myTimer, 1000);
                                function myTimer() {
                                    decompte--;
                                    document.getElementById('temps2').innerHTML = 'Vous etes deja connecté, redirection dans '+decompte+' secondes';
                                }
                            </script>
                            <?php
                            break;
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>