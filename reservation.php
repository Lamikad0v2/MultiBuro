<?php session_start();
include_once "db.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MultiBuro Réservation</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2035 Gray Host
http://www.tooplate.com/view/2035-gray-host
-->
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="Slam.css" rel="stylesheet" type="text/css" />
<script src="function.js"></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js'></script>


</head>
<body>

<div id="tooplate_wrapper">
	
	<div id="tooplate_header">
		<div id="site_title"><h1><a href="#">MultiBuro</a></h1></div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="reservation.php" class='current'>Réservation</a></li>
                <li><a href="info.php">Informations</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of tooplate_header -->
    
    <div id="tooplate_middle">
		<h1>Meilleur service de réservation !</h1>
        <div class="col_w220 float_l">
            <ul class="tooplate_list">
                <li>Lorem Ipsum </li>
                <li>Lorem Ipsum</li>
                <li>Lorem Ipsum</li>
                <li>Lorem Ipsum</li>
            </ul>
        </div>
        
        <div class="cleaner"></div>
        <a class="more float_r" href="singUp.php">S'enregistrer</a>
        <div class="cleaner"></div>
	</div> <!-- end of tooplate_middle -->
    
    <div id="tooplate_main">
    
    	<h2>Abonnement</h2>
        <table class="plans" cellpadding="0" cellspacing="0">
        	<tr class="header">
            	<th class="left features">Options</th>
				<th>Journalier</th>
                <th>Hebdomadaire</th>
                <th>Mensuel</th>
			</tr>
            <tr class="even">
            	<td class="left">PC</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
			</tr>
            <tr class="odd">
            	<td class="left">Parking</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
                <td>Unlimited</td>
			</tr>
            <tr class="even">
            	<td class="left">Places</td>
                <td>3</td>
                <td>10</td>
                <td>Unlimited</td>
			</tr>
            <tr class="odd">
            	<td class="left">On verra</td>
                <td><img src="images/tooplate_ex.png" alt="" /></td>
                <td><img src="images/tooplate_ex.png" alt="" /></td>
                <td><img src="images/tooplate_in.png" alt="" /></td>
			</tr>
            <tr class="even">
            	<td class="left">PLus tard</td>
                <td><img src="images/tooplate_ex.png" alt="" /></td>
                <td><img src="images/tooplate_ex.png" alt="" /></td>
                <td><img src="images/tooplate_in.png" alt="" /></td>
			</tr>
            <tr class="odd">
            	<td class="left">JE sais pas</td>
                <td><img src="images/tooplate_in.png" alt="" /></td>
                <td><img src="images/tooplate_in.png" alt="" /></td>
                <td><img src="images/tooplate_in.png" alt="" /></td>
			</tr>
            <tr>
            <td class="left"></td>
            <?php
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_util'])) {
    // Rediriger l'utilisateur vers la page de connexion car il n'est pas connecté
    header("Location: connexion.php");
    exit();
}
// Vérifier si la date de réservation a été soumise pour un bouton spécifique
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date_reservation"]) && isset($_POST["btn_id"])) {
    // Récupérer la date de réservation soumise et l'ID du bouton cliqué
    $date_reservation = $_POST["date_reservation"];
    $btn_id = $_POST["btn_id"];

    // Calculer la date de fin en fonction du bouton cliqué
    switch ($btn_id) {
        case 1:
            $date_fin_reservation = date('Y-m-d', strtotime($date_reservation . ' + 1 day'));
            break;
        case 2:
            $date_fin_reservation = date('Y-m-d', strtotime($date_reservation . ' + 7 days'));
            break;
        case 3:
            $date_fin_reservation = date('Y-m-d', strtotime($date_reservation . ' + 30 days'));
            break;
        default:
            $date_fin_reservation = "";
    }

    // Récupérer l'ID de l'utilisateur connecté
    $id_util = $_SESSION["id_util"];

    // Insérer la réservation dans la base de données
    try {
        $pdo = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.BDD, LOGIN, PASSW);
        $sql = "INSERT INTO reservation (date_res, id_util, btn_id, date_fin) VALUES (:date_res, :id_util, :btn_id, :date_fin)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":date_res", $date_reservation);
        $stmt->bindParam(":id_util", $id_util);
        $stmt->bindParam(":btn_id", $btn_id);
        $stmt->bindParam(":date_fin", $date_fin_reservation);
        $stmt->execute();

        // Afficher un message de confirmation
        $success_message = "Votre réservation pour le $date_reservation jusqu'au $date_fin_reservation a été effectuée avec succès !";
    } catch (PDOException $e) {
        // Afficher un message d'erreur en cas de problème avec la base de données
        $error_message = "Une erreur est survenue lors de la réservation. Veuillez réessayer plus tard.";
    }
}
// Afficher les boutons de réservation avec leurs modals respectifs
?>

<td class="signup">20€/jsp<a href="#" class="more" onclick="openModal('modal1')">Réserver</a></td>
<div id="modal1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal1')">&times;</span>
        <h2>Réservation</h2>
        <?php if(isset($success_message) && $btn_id == 1): ?>
            <p class="success-message"><?php echo $success_message ?></p>
        <?php endif; ?>
        <?php if(isset($error_message) && $btn_id == 1): ?>
            <p class="error-message"><?php echo $error_message ?></p>
        <?php endif; ?>
        <form id="reservation1" method="POST">
            <label for="date1">Date de réservation:</label>
            <input type="date" id="date1" name="date_reservation" required>
            <input type="hidden" name="btn_id" value="1">
            <button type="submit">Réserver</button>
        </form>
    </div>
</div>
<td class="signup">40€/jsp<a href="#" class="more" onclick="openModal('modal2')">Reserver</a></td>
<div id="modal2" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal2')">&times;</span>
        <h2>Réservation</h2>
        <?php if(isset($success_message) && $btn_id == 2): ?>
            <p class="success-message"><?php echo $success_message ?></p>
        <?php endif; ?>
        <?php if(isset($error_message) && $btn_id == 2): ?>
            <p class="error-message"><?php echo $error_message ?></p>
        <?php endif; ?>
        <form id="reservation2" method="POST">
            <label for="date2">Date de réservation:</label>
            <input type="date" id="date2" name="date_reservation" required>
            <input type="hidden" name="btn_id" value="2">
            <button type="submit">Réserver</button>
        </form>
    </div>
</div>
<td class="signup">60€/jsp<a href="#" class="more" onclick="openModal('modal3')">Reserver</a></td>
<div id="modal3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal3')">&times;</span>
        <h2>Réservation</h2>
        <?php if(isset($success_message) && $btn_id == 3): ?>
            <p class="success-message"><?php echo $success_message ?></p>
        <?php endif; ?>
        <?php if(isset($error_message) && $btn_id == 3): ?>
            <p class="error-message"><?php echo $error_message ?></p>
        <?php endif; ?>
        <form id="reservation3" method="POST">
            <label for="date3">Date de réservation:</label>
            <input type="date" id="date3" name="date_reservation" required>
            <input type="hidden" name="btn_id" value="3">
            <button type="submit">Réserver</button>
        </form>
    </div>
</div>
			</tr>
		</table>
        
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