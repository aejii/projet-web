<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">S'inscrire</h3>
                </div>
                <div class="panel-body">
                    <form role="form"action="inscription.php" enctype ="multipart/form-data" method = "post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nom d'utilisateur" name="pseudo" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mot de passe" name="mdp" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirmer mot de passe" name="cmdp" type="password" value="">
                            </div>
                            <div class="form-group">
                            	Photo de profil : 
                            	<input type ="hidden" name = "MAX_FILE_SIZE" value ="3000000" />
								<input name ="fichier" type ="file" />
                            </div>
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Valider">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
