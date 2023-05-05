<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informations</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="tooplate_wrapper">
	
	<div id="tooplate_header">
		<div id="site_title"><h1><a href="#">MultiBuro</a></h1></div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="reservation.php">Réservation</a></li>
                <li><a href="info.php" class = "current">Informations</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of tooplate_header -->
    
    <div id="tooplate_middle">
		<h1>MultiBuro</h1>
        <em>Informations !</em>
        <ul class="tooplate_list">
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
        </ul>
        <div class="cleaner"></div>
        <a class="more float_r" href="singUp.php">S'enregistrer</a>
        <div class="cleaner"></div>
	</div> <!-- end of tooplate_middle -->
    
    <div id="tooplate_main">
    
    	<h2>Informations</h2>	
        <?php 
        if(isset($_SESSION["id_util"])){
            echo "Nom : ".$_SESSION["nom_util"]."<br>";
            echo "Prénom : ".$_SESSION["prenom_util"]."<br>";
            echo "Email : ".$_SESSION["email_util"]."<br>";
            echo "ID organisation : ".$_SESSION["id_orga"]."<br>";
        ?>  <a class="more float_r" href="singOut.php">Se deconnecter</a><?php
        }
        else {
            echo '<a class="more float_r" href="connexion.php">Se connecter</a>';
        }
?>
        <div class="cleaner"></div>
    </div> <!-- end of tooplate_main -->    
</div> <!-- end of tooplate_wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
    	Copyright © 2069 <a href="#">MultiBuro Chevrier</a>
        <div class="cleaner"></div>
	</div><!--end of tooplate_footer-->
</div><!--end of tooplate_footer_wrapper-->

</body>
</html>