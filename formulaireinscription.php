<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">S'inscrire</h3>
                </div>
                <div class="panel-body">
                    <form role="form" name="inscriptform" action="inscription.php" enctype ="multipart/form-data" method = "post" onsubmit="return validateForm()">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nom d'utilisateur" id="pseudo" name="pseudo" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" id="email" name="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mot de passe" id="mdp" name="mdp" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirmer mot de passe" id="cmdp" name="cmdp" type="password" value="">
                            </div>
                            <div class="form-group">
                            	Photo de profil : 
                            	<input type ="hidden" name = "MAX_FILE_SIZE" value ="3000000" />
								<input name ="fichier" type ="file" />
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
                            <div class="form-group">
                                <a href="login.php" class="active">Deja un compte ? Se connecter</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var x = document.forms["inscriptform"]["pseudo"].value;
        if (x.length <= 5) {
            alert("Votre pseudo doit possèder au moins 5 caractères");
            return false;
        }
        const regex = new RegExp(/([^A-Zéçàèêëîïa-z0-9-])/);
        if (regex.test (x)) {
            alert("Votre pseudo doit possèder seulement des caractères a-z 0-p çéèàêîïë");
            return false;
        }
        var a = document.forms["inscriptform"]["email"].value;
        const regexEmail = new RegExp(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        if (!regexEmail.test(a)) {
            alert("Votre email semble faux :/");
            return false;
        }
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