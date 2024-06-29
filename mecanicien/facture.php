<?php

// Connect to database (replace with your credentials)
$db = new mysqli('localhost', 'root', '', 'ndongofall');

// Check connection
if ($db->connect_error) {
    die('Erreur de connexion à la base de données : ' . $db->connect_error);
}

// Process form data
$panne = $_POST['panne'];
$date_facture = $_POST['date_facture'];
$immatriculation = $_POST['immatriculation'];
$nom_chauffeur = $_POST['nom_chauffeur'];


// Insert invoice header into database
$sql_insert_header = "INSERT INTO factures (panne, date_facture, immatriculation, nom_chauffeur) VALUES ('$panne', '$date_facture', '$immatriculation', '$nom_chauffeur')";
if ($db->query($sql_insert_header) === TRUE) {
    $facture_id = $db->insert_id;
} else {
    echo "Erreur d'insertion de l'en-tête de facture : " . $db->error;
    exit;
}


// Process invoice lines
$lignes_facture = $_POST['produit'];
$quantites = $_POST['quantite'];
$prix_unitaires = $_POST['prix_unitaire'];
$totaux_lignes = $_POST['total_ligne'];


for ($i = 0; $i < count($lignes_facture); $i++) {
    $produit = $lignes_facture[$i];
    $quantite = $quantites[$i];
    $prix_unitaire = $prix_unitaires[$i];
    $total_ligne = $quantite * $prix_unitaire;

    // Insert invoice line into database
    $sql_insert_line = "INSERT INTO factures_lignes (facture_id, produit, quantite, prix_unitaire, total_ligne) VALUES ($facture_id, '$produit', $quantite, $prix_unitaire, $total_ligne)";
    if ($db->query($sql_insert_line) !== TRUE) {
        echo "Erreur d'insertion de la ligne de facture : " . $db->error;
        exit;
    }
}
// partie pour le comptable!
$sql_insert_header = "INSERT INTO facturecompta (date_facture, total_ligne, nom_chauffeur, immatriculation, panne )  VALUES ('$date_facture','$total_ligne',  '$nom_chauffeur', '$immatriculation', '$panne' )";
if ($db->query($sql_insert_header) === TRUE) {
    // Récupération de l'ID de la facture nouvellement insérée
    $facture_id = $db->insert_id;
} else {
    // Affichage d'un message d'erreur en cas d'échec de l'insertion
    echo "Erreur d'insertion de l'en-tête de facture dans la table facturecompta : " . $db->error;
    exit;
}

// Insert invoice header into database
$sql_insert_header = "INSERT INTO historique (date_facture,nom_chauffeur,immatriculation,panne,produit,total_ligne) VALUES ('$date_facture','$nom_chauffeur','$immatriculation','$panne','$produit','$total_ligne')";
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
