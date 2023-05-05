<?php
// Démarrer la session
session_start();
include_once 'db.inc.php';

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['id_util'])) {
  // Rediriger l'utilisateur vers la page d'accueil car il est déjà connecté
  header("Location: index.php");
  exit();
}

$pdo = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.BDD, LOGIN, PASSW);
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Récupérer les données du formulaire
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Préparer la requête SQL
  $sql = "SELECT * FROM utilisateur WHERE email_util = :email";

  // Préparer la déclaration PDO
  $stmt = $pdo->prepare($sql);

  // Lier les paramètres
  $stmt->bindParam(":email", $email);

  // Exécuter la requête
  $stmt->execute();

  // Récupérer la première ligne du résultat
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'utilisateur existe et si le mot de passe est correct
if ($user && hash('sha256', $password) == $user["mdp_util"]) {
  // Stocker les informations de l'utilisateur dans la session
  $_SESSION["id_util"] = $user["id_util"];
  $_SESSION["nom_util"] = $user["nom_util"];
  $_SESSION["prenom_util"] = $user["prenom_util"];
  $_SESSION["email_util"] = $user["email_util"];
  $_SESSION["id_orga"] = $user["id_orga"];

  if (basename($_SERVER['PHP_SELF']) == "info.php") {
    // Rediriger l'utilisateur vers la page d'information
    header("Location: info.php");
  } else {
    // Rediriger l'utilisateur vers la page d'accueil
    header("Location: index.php");
  }
  exit();
} else {
  // Afficher un message d'erreur si l'utilisateur n'existe pas ou si le mot de passe est incorrect
  $errorMessage = "Identifiants incorrects.";
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Connexion</title>
</head>
<body>
  <h1>Connexion</h1>

  <?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
  <?php endif; ?>

  <form method="post">
    <div>
      <label for="email">Adresse email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="password">Mot de passe:</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Se connecter</button>
  </form>
</body>
</html>
