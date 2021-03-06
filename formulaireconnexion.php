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
                                    <?php if(isset($erreur)){ ?>
                                        <input class="form-control" placeholder="Nom d'utilisateur" name="pseudo" value="<?php echo $_POST["pseudo"] ?>" autofocus>
                                    <?php }else{ ?>
                                        <input class="form-control" placeholder="Nom d'utilisateur" name="pseudo" autofocus>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" name="mdp" type="password" value="">
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