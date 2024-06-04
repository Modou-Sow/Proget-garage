<?php
// Démarrer la session
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flott";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hasher le mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Préparer la requête SQL
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

// Exécuter la requête
if ($conn->query($sql) === TRUE) {
    // Rediriger l'utilisateur vers la page de connexion
    header("Location: ndongo.html");
    exit();
} else {
    echo "Erreur lors de la création du compte : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>