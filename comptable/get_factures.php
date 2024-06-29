<?php

header('Content-Type: text/html; charset=UTF-8');

// Connectez-vous à votre base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ndongofall";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour récupérer les factures en attente d'encaissement
$sql = "SELECT * FROM facturecompta ";
$result = $conn->query($sql);

if (isset($_POST['encaisser'])) {
    // Récupérez l'ID de la facture à partir du formulaire
    $factureId = $_POST['facture_id'];

    // Mettez à jour le statut de la facture dans la base de données
    $sql = "UPDATE facturecompta SET statut = 'Encaissé' WHERE id = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $factureId); //  pour lier le paramètre
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // pour affucher sur la mm page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p class='erreur'>Facture $factureId déja encaissée.</p>";
    }
}
if (isset($_POST['annuler'])) {
    // Récupérez l'ID de la facture à partir du formulaire
    $factureId = $_POST['facture_id'];

    // Mettez à jour le statut de la facture dans la base de données
    $sql = "UPDATE facturecompta SET statut = 'Annulée' WHERE id = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $factureId); //  pour lier le paramètre
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Redirigez vers la même page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p class='erreur'>Facture $factureId déja annulée.</p>";
    }
}
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <title>Factures en attente d'encaissement</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .encaisser-btn, .annuler-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .annuler-btn {
            background-color: #f44336;
        }
        .erreur {
            color: red; 
            font-weight: bold; 
            background-color: #ffe0e0; 
            padding: 10px;
            border: 1px solid red; 
            margin-bottom: 10px; 
    }
    </style>
</head>
<body>
    <h1>Factures en attente d'encaissement</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Montant</th>
                <th>Chauffeur</th>
                <th>Panne</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Parcourez les résultats et affichez-les dans le tableau
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["date_facture"] . "</td>";
                    echo "<td>" . $row["total_ligne"] . " €</td>";
                    echo "<td>" . $row["nom_chauffeur"] . "</td>";
                    echo "<td>" . $row["panne"] . "</td>";
                    echo "<td>" . $row["statut"] . "</td>";
                    echo "<td>
                        <form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                            <input type='hidden' name='facture_id' value='" . $row["id"] . "'>
                            <button type='submit' name='encaisser' class='encaisser-btn'>Encaisser</button>
                        </form>
                        <form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                            <input type='hidden' name='facture_id' value='" . $row["id"] . "'>
                            <input type='hidden' name='action' value='annuler'>
                            <button type='submit' name='annuler' class='annuler-btn'>Annuler</button>
                    </form>
                    </td>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucune facture en attente d'encaissement</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>