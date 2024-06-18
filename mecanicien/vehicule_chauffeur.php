<?php

// Connect to database (replace with your credentials)
$db = new mysqli('localhost', 'root', '', 'ndongofall');

// Check connection
if ($db->connect_error) {
    die('Erreur de connexion à la base de données : ' . $db->connect_error);
}

// Process form data
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$immatriculation = $_POST['immatriculation'];
$marque_voiture = $_POST['marque_voiture'];

// Insert invoice header into database
$sql_insert_header = "INSERT INTO vhch (nom, prenom, adresse, telephone,email,immatriculation,marque_voiture) VALUES ('$nom', '$prenom', '$adresse', '$telephone','$email','$immatriculation','$marque_voiture')";
if ($db->query($sql_insert_header) === TRUE) {
    $facture_id = $db->insert_id;
} else {
    echo "Erreur d'insertion de l'en-tête de facture : " . $db->error;
    exit;
}

// Redirect to success page or display confirmation message
header('Location: meca-dashboard.html'); // Replace with your success page URL
exit;

?>
