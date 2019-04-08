<!-- Navigation -->
		
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Ae site</a>
                </div>
                <!-- /.navbar-header -->
				<div id="menu" class="navbar-header">
					<?php
						if (isset($_SESSION["ID"]))
						{
					?><a class="navbar-brand" href="forum.php">Forums</a>
					<a class="navbar-brand" href="index.php?deco=1">Deconnexion</a>
					<?php
						}
						else
						{
					?><a class="navbar-brand" href="login.php">Se connecter</a>
					<a class="navbar-brand" href="inscription.php">s'inscrire</a>
					<?php
						}
					?>
				</div>
            <ul class="nav navbar-top-links navbar-right"> 
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> Nothing new
                                        <span class="pull-right text-muted small">a long time ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                           <!-- <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            -->
                            <li>
                                <a class="text-center" href="myalert.php">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <?php
                                if (isset($_SESSION["ID"]))
                                {
                            ?>
                            <li><a href="utilisateurs.php"><i class="fa fa-user fa-fw"></i> Profil</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Paramètres</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                            </li>
                            <?php
                                }
                                else
                                {
                            ?>
                            <li><a class="fa fa-user fa-fw" href="login.php"> Se connecter</a></li>
                            <li><a class="fa fa-user fa-fw" href="inscription.php"> S'inscrire</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
        