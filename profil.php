<?php 
session_start();
require "connection.php";

if(isset($_GET['id']) AND $_GET['id']>0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM utilisateurs WHERE id=?');
    $requser->execute(array($getid));

    $userinfo = $requser->fetch(); // pour chcercher les information de l'utilisateurs 
}

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{
    $taillemax = 2097152; // limite de taille max du fichier qui est de 2Mo
    $extensionValides = array('jpg','png','gif','jpeg');
    if($_FILES['avatar']['size'] <= $taillemax)
    {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); // strrch pour recuperer l'extenssion
        if(in_array($extensionUpload, $extensionValides))
        {
            $chemin = "membres/avatars/" .$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'] , $chemin);
            if($resultat)
            {
                $updateavatar= $bdd->prepare('UPDATE utilisateurs SET avatar = :avatar WHERE id = :id');
                $updateavatar->execute(array(
                    'avatar' => $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']

                ));

                header('Location: profil.php?id='.$_SESSION['id']);
            }
            else
            {
                $msg = "erreur durant l'importation de votre photo e profil";
            }
        }
        
        else
        {
            $msg = "votre photo de profil doit etre sous format jpeg , jpg , png";
        }
    }
    else{
        $msg = "votre photos de profil ne dois pas depacer 2Mo";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
   -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="profil.css"> 
  

    
    <title>page de profile cookie</title>
</head>
<body>
 <div class="M1"   >
<div class="container-fluid " ><br><br>
<div  class="col-xs-2 col-md-5">
<div  class="col-xs-1 col-md-3 " style=" padding-left:0px;">
<div style="text-align: left;">
<div class="container">
       <div class="btn-group btn-group-vertical">
            <div class="btn-group"> 
                <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                    <span class="glyphicon glyphicon-user"></span>
                    <p>Profile </p>
                </button>
              </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav  onclick="javascript:window.location.href='login.php'" " >
                    <span class="glyphicon glyphicon-calendar"></span>
    			    <p>Options</p>
                </button>
            </div>
             <div class="btn-group">
                <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                    <span class="glyphicon glyphicon-globe"></span>
        		    <p>A propos</p>
                </button>
            </div>
                 
            <div class="btn-group">
                <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                    <span class="glyphicon glyphicon-picture"></span>
    			    <p>Legacy </p>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav" onclick="javascript:window.location.href='login.php'">
                    <span class="glyphicon glyphicon-time"></span>
    			    <p>Statistics</p>
                </button>
            </div>
           
	</div>
</div>
</div>
</div>
    	<form method="POST" action= "" enctype=" multipart/form-data" role="form" class="form-inline col-md-9 go-right" style="color: Green;background-color:#FAFAFF;border-radius:0px 22px 22px 22px; ">
			<!-- <h2>Profile de <?php echo $userinfo['pseudo'];?> </h2> -->
            <!-- <?php
            
            if($userinfo['id'] == $_SESSION['id'])
            {
                
                 ?>
                 <a href="#"> Editer mon profile</a>
                 <?php
            }
            ?> -->
            <br><br>
            <p>Mettre à jour votre profil pour plus de securité.</p>
            <br>
		<div class="form-group">            
			<input id="Firstname" name="Firstname" type="text" class="form-control"  style="width:400px;" required>
			<label for="Firstname">Speudo <span class="glyphicon glyphicon-user"> </span></label>
            
		</div>
        <br><br>
        <div class="form-group">            
			<input id="pwd" name="Firstname" type="text" class="form-control"  style="width:400px;"  required>
            <label for="Firstname">Mot de passe <span class="glyphicon glyphicon-user"> </span></label>
            
        </div>
        <br><br>
        <div class="form-group">            
			<input id="Firstname" name="Firstname" type="text" class="form-control"  style="width:400px;" required>
			<label for="Firstname">confirmation de mot de passe <span class="glyphicon glyphicon-user"> </span></label>
            
		</div>
        
         
        <br><br>
         <div class="form-group">
    		<input id="Email1" name="phone" class="form-control" style="width:400px;" placeholder="Votre email" ></textarea>
			<label for="Email1"> email <span class="glyphicon glyphicon-align-envelope"></label>
        </div>
        <br><br>
            <label for="">Avatar :</label> 
            <input type="file" name="avatar" style="width:300px;" id="fichier" /> <br>

        <input type="submit" style="width:200px;"  value = "Mettre à jour mon profil"/>
        <br>
        <br>
        </form>
      </div>
      

</div>
</div>
   
</body>
</html>
 








