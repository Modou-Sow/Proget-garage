<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flott";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}

// Vérification des identifiants de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
// Récupération des informations de l'utilisateur
// Récupération des informations de l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification des identifiants de connexion
if ($result && $result['password'] === $password) {
    // Vérification du type utilisateur
    switch ($result['enumType']) {
        case 'admin':
            header('Location: admin-dashboard.html');
            exit;
        case 'secretaire':
            header('Location: secretaire-dashboard.html');
        case 'meca':
            header('Location: C:\xampp\htdocs\Proget-garage\meca-dashboard.html');
         case 'comptable':
            header('Location: C:\xampp\htdocs\Proget-garage\meca-dashboard.html');
            exit;
        default:
            // Gérer le cas où le type n'est pas reconnu
            echo "Rôle d'utilisateur non reconnu.";
            exit;
    }
} else {
    // Identifiants invalides
    echo "identifiants incorrects.";
}
}

