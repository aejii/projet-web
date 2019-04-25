<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $titre ?></h3>
                </div>
                <div class="panel-body">
                <?php
                    switch ($form) {
                        case 0:
                            require "formemail.php";
                            break;
                        case 1:
                            ?>
                            <a href="inscription.php" class="active">Pas de compte ? S'inscrire</a>
                            <a href="login.php" class="active">Se connecter</a>
                            <?php
                            break;
                        case 2:
                            echo "i égal 2";
                            break;
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>