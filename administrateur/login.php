<?php

// Vérifier si le formulaire a été soumis
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    // (Remplacez les informations de connexion par vos propres informations)
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "ndongofall";

    $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Erreur de connexion à la base de données : " . $db->connect_error);
    }

    // Préparer la requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";

    // Préparer la requête
    $stmt = $db->prepare($sql);

    // Lier les paramètres à la requête
    $stmt->bind_param("ss", $username, $password);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats de la requête
    $result = $stmt->get_result();

    // Vérifier si un utilisateur a été trouvé avec les informations d'identification fournies
    if ($result->num_rows == 1) {
        // Démarrer une session
        session_start();

        // Stocker les informations de l'utilisateur dans la session
        $row = $result->fetch_assoc();
        $_SESSION['utilisateur_id'] = $row['id'];
        $_SESSION['nom_utilisateur'] = $row['username'];

        // Rediriger vers la page d'accueil
        header("Location:index.html");
        exit();
    } else {
        // Afficher un message d'erreur
        echo '<div class="error-message" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Identifiants incorrects.</div>';    }
    
}
?>
<style>
    .error-message {
  color: red;
  font-weight: bold;
  padding: 10px;
  border: 1px solid red;
  border-radius: 5px;
  background-color: white;
  text-align: center;
}

</style>
