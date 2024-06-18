<?php

// Vérifier si le formulaire a été soumis
// if (isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Connexion à la base de données
//     // (Remplacez les informations de connexion par vos propres informations)
//     $dbHost = "localhost";
//     $dbUser = "root";
//     $dbPassword = "";
//     $dbName = "ndongofall";

//     $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

//     if ($db->connect_error) {
//         die("Erreur de connexion à la base de données : " . $db->connect_error);
//     }

//     // Préparer la requête SQL pour vérifier les informations d'identification
//     $sql = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";

//     // Préparer la requête
//     $stmt = $db->prepare($sql);

//     // Lier les paramètres à la requête
//     $stmt->bind_param("ss", $username, $password);

//     // Exécuter la requête
//     $stmt->execute();

//     // Récupérer les résultats de la requête
//     $result = $stmt->get_result();

//     // Vérifier si un utilisateur a été trouvé avec les informations d'identification fournies
//     if ($result->num_rows == 1) {
//         // Démarrer une session
//         session_start();

//         // Stocker les informations de l'utilisateur dans la session
//         $row = $result->fetch_assoc();
//         $_SESSION['utilisateur_id'] = $row['password'];
//         $_SESSION['nom_utilisateur'] = $row['username'];

//         // Rediriger vers la page d'accueil
//         header("Location:index.html");
//         exit();
//     } else {
//         // Afficher un message d'erreur
//         echo 'erreur';
//     }
// }

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=ndongofall', 'utilisateurs', '');

// Réception des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Validation du username
if (empty($username)) {
  echo "Erreur : Veuillez saisir un nom d'utilisateur.";
  exit();
}

// Préparation de la requête SQL
$sql = "SELECT * FROM utilisateurs WHERE username = :username";
$stmt = $db->prepare($sql);

// Liaison du paramètre avec la valeur
$stmt->bindParam(':username', $username);

// Exécution de la requête
$stmt->execute();

// Récupération du résultat
$user = $stmt->fetch();

// Vérification de l'existence de l'utilisateur
if (!$user) {
  echo "Erreur de connexion : Nom d'utilisateur incorrect.";
  exit();
}

// Vérification du mot de passe
if (!password_verify($password, $user['password'])) {
  echo "Erreur de connexion : Mot de passe incorrect.";
  exit();
}

// Connexion réussie
// Démarrer une session (si nécessaire)
session_start();
$_SESSION['utilisateur_id'] = $user['id'];
$_SESSION['nom_utilisateur'] = $user['username'];

header("Location:index.html");
exit();
echo "Connexion réussie !";

?>