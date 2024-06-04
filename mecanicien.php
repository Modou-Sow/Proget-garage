<?php

// Informations de connexion à la base de données
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ndongofall";

// Connexion à la base de données
$db = new mysqli($db_host, $db_user, $db_password, $db_name);

// Vérifier la connexion
if ($db->connect_error) {
    die("Erreur de connexion à la base de données: " . $db->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$contact = $_POST["contact"];

// Préparer la requête SQL pour insérer les données
$sql = "INSERT INTO Chauffeurs (nom, prenom, contact) VALUES ('$nom', '$prenom', '$contact')";

// Exécuter la requête SQL
if ($db->query($sql) === TRUE) {
    echo "Vos informations ont été enregistrées avec succès!";
} else {
    echo "Erreur lors de l'enregistrement des informations: " . $db->error;
}

// Fermer la connexion à la base de données
$db->close();

?>
