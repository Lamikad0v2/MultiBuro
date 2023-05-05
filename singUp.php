<!--
     Chevrier Jordan le 24/03/2023   
    singUp.php
    Page PHP pour le Sing UP de Multiburo
-->
<html>
    <head>
        <title>SingUp Multiburo</title>
        <meta charset="UTF-8">
        <!-- Lien vers le fichier de style CSS -->
        <link href="style.css" rel="stylesheet" type="text/css" media="screen">
        <?php 
        //Ouverture du fichier db.inc.php
        require_once 'db.inc.php';
        //création de l'objet PDO
        $cnx = new PDO('mysql:dbname='.BDD.';host='.HOST.';port='.PORT,LOGIN,PASSW); ?>
        
    </head>
    <body>
        <div class="conteneur">
            <h1>Inscrivez-vous !</h1>
            <form action="inscription.php" method="post">
                <div><label for="nom_util">Nom :</label><input name="nom_util" type="text" placeholder="Saisissez votre nom"></div>
                <div><label for="prenom_util">Prenom :</label><input name="prenom_util" type="text" placeholder="Saisissez votre prenom"></div>
                <div><label for="adr_util">Adresse :</label><input name="adr_util" type="text" placeholder="Saisissez votre adresse"></div>
                <div><label for="cp_util">Code Postal :</label><input name="cp_util" type="text" placeholder="Saisissez votre code postal"></div>
                <div><label for="ville_util">Ville :</label><input name="ville_util" type="text" placeholder="Saisissez votre ville"></div>
                <div><label for="tel_util">Telephone :</label><input name="tel_util" type="text" placeholder="Saisissez votre telephone"></div>
                <div><label for="id_orga">Organisation :</label><input name="id_orga" type="num" placeholder="Saisissez votre orga"></div>                           
                <div><label for="email_util">Email :</label><input name="email_util" type="text" placeholder="Saisissez votre email"></div>
                <div><label for="mdp_util">Nouveau mot de passe :</label><input name="mdp_util" type="password" placeholder="Saisissez votre mot de passe"></div>                               
                <?php
                session_start();
                if(isset($_SESSION['message'])) {
                    echo '<p class="error">' . $_SESSION['message'] . '</p>';
                    unset($_SESSION['message']);
                }
                ?>
                <div class="barreBouton"><input type="submit" name="signup" value="S'inscrire"></div>
            </form>
            <div class="barreBouton"><input type="submit" name="Retour" value="Retour" onclick="location.href='index.php'"></div>
        </div>
    </body>
</html>
