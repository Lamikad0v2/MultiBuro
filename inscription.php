<html>
    <head>
        <title>Chevrier_multiburo</title>
        <meta charset="UTF-8">
        <!-- Lien vers le fichier de style CSS -->
        <link href="style.css" rel="stylesheet" type="text/css" media="screen">
        <!-- Lien vers le fichier de constantes PHP -->
        <?php include_once 'db.inc.php'; ?>
        
    </head>
    <body>
        <?php
        //récupération du nom
            if (isset($_POST['nom_util'])) 
                $nom = $_POST['nom_util'];
            //récupération du prenom
            if (isset($_POST['prenom_util'])) 
                $prenom = $_POST['prenom_util'];
            //récupération de l'adresse
            if (isset($_POST['adr_util'])) 
                $adresse = $_POST['adr_util'];
            //récupération du CP
            if (isset($_POST['cp_util'])) 
                $code_postal = $_POST['cp_util'];
            //récupération de la ville
            if (isset($_POST['ville_util'])) 
                $ville = $_POST['ville_util'];
            //récupération du telephone
            if (isset($_POST['tel_util'])) 
                $telephone = $_POST['tel_util'];
            //récupération du organisation
            if (isset($_POST['id_orga'])) 
                $organisation = $_POST['id_orga'];
            //récupération du login
            if (isset($_POST['email_util'])) 
                $login = $_POST['email_util'];
            //récupération du mot de passe + hash256            
            if (isset($_POST['mdp_util'])) 
                $passw = hash('sha256', $_POST['mdp_util']);  
       
            require_once 'db.inc.php';
        try {
            $dbh = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.BDD, LOGIN, PASSW);

            // Préparation de la requête SQL
            $stmt = $dbh->prepare("INSERT INTO utilisateur (nom_util, prenom_util, adr_util, cp_util, ville_util, tel_util, id_orga, email_util, mdp_util) 
                VALUES (:nom, :prenom, :adresse, :code_postal, :ville, :telephone, :organisation, :login, :passw)");

            // Affectation des valeurs aux paramètres de la requête préparée
            if ($stmt->execute(array(':nom'=>$nom, ':prenom'=>$prenom, ':adresse'=>$adresse, ':code_postal'=>$code_postal, ':ville'=>$ville, ':telephone'=>$telephone, ':organisation'=>$organisation, ':login'=>$login, ':passw'=>$passw))) {
                // Si l'insertion est réussie, rediriger vers la page de connexion
                header('Location: connexion.php');
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['message'] = "Erreur lors de l'inscription : ".$e->getMessage();
        }
    ?>    
      
    </body>
</html>
