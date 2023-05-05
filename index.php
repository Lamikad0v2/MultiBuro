<?php
session_start(); 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MultiBuro</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2035 Gray Host
http://www.tooplate.com/view/2035-gray-host
-->
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="tooplate_wrapper">
	
	<div id="tooplate_header">
		<div id="site_title"><h1><a href="#">MultiBuro</a></h1></div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="index.php" class="current">Accueil</a></li>
                <li><a href="reservation.php">Réservation</a></li>
                <li><a href="info.php">Informations</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of tooplate_header -->
    
    <div id="tooplate_middle">
		<h1>MultiBuro</h1>
        <em>Meilleur service de réservation !</em>
        
        <div class="col_w220 float_l">
            <ul class="tooplate_list">
                <li>Bureau individuel</li>
                <li>Salle de réunion</li>
                <li>OpenSpace</li>
                <li>Multitude d'options pour chacun !</li>
            </ul>
        </div>
        
		<div class="col_w220 float_r">
            <ul class="tooplate_list">
            	<li>Pc et bureau à disposition</li>
                <li>Nombre de places modifiable</li>
                <li>Espace collaboratif sure</li>
                <li>Places de parking</li>
            </ul>
        </div>
        <a class="more float_r" href="singUp.php">S'inscrire</a>
        <?php
        if (isset($_SESSION['email_util'])) { // Vérifier si l'utilisateur est connecté

        } else {
        // Afficher le bouton "Se connecter"
        echo '<a class="more float_l" href="connexion.php">Se connecter</a>';
        }
        ?>
	</div>
    
    <div id="tooplate_main">
    
    	<div class="fp_services">
            <div class="fp_services_box">
                <div class="fps_title">Abonnement journalier</div>
                <p>Réservation d'une journée</p>
                <p class="price">prix de départ <span>20€/jour</span></p>
                <a href="reservation.php" class="more">Voir les offres</a>
            </div>
            
			<div class="fp_services_box">
                <div class="fps_title">Abonnement hebdomadaire</div>
                <p>Réservation sur 1mois renouvelable</p>
                <p class="price">prix de départ <span>300€/mois</span></p>
                <a href="reservation.php" class="more">Voir les offres</a>
            </div>
            
			<div class="fp_services_box last_box">
                <div class="fps_title">Abonnement mensuel (12mois)</div>
                <p>Réservation sur 12 mois renouvelable</p>
                <p class="price">prix de départ <span>1200€/ans</span></p>
                <a href="reservation.php" class="more">Voir les offres</a>
            </div>
        	
			<div class="cleaner"></div>
        </div>
        
        <div class="col_w960">
        	<div class="col_allw300">
            	<div class="cont_title">Informations</div>
                <p><em>Présent dans le game depuis les année 10 mon gaté on est présent</em></p>
                <ul class="tooplate_list">
                    <li>Différents bureau</li>
                    <li>Salle équipée</li>
                    <li>OpenSpace spacieux</li>
                    <li>PC à jour et en bon état</li>
                </ul>
            </div>
            
			<div class="col_allw300">
            	<div class="cont_title">Pourquoi nous et pas un autre ?</div>
                <p><em>Déjà parceque on est les meilleurs, meilleur emplacement, et surtout on a un meilleur flow</em></p>
            </div>
            
			<div class="col_allw300 col_last">
           	<div class="cont_title">A propos</div>
              <p align="justify">J'ai rien a écrire pour le moment on verra plus tard</p>
            </div>
        </div>
    	
        <div class="cleaner"></div>
    
	</div>
    
</div>

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
    	Copyright © 2069 <a href="#">MultiBuro Chevrier</a>
	</div>
</div>

</body>
</html>