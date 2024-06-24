<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <!-- <link rel="stylesheet" href="bd.css"> -->
    <title>Document</title>
</head>
<body>

<?php
    $pdo = new PDO ("mysql:host=localhost;dbname=ndongofall", "root" ,"");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM vhch ";
    $stmt = $pdo ->query($sql);
    $stmt ->execute();
    print "<h3><b> Liste Voiture avec Chauffeur</b>:".$stmt-> rowCount()."</h3>";

    ?>
    <table>
    <tr>
    <th>Id</th>

        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Immatriculation</th>
        <th>Marque</th>

        <!-- Ajoutez d'autres en-têtes de colonnes ici si nécessaire -->
    </tr>
    <?php
    while ($row = $stmt -> fetch( PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['adresse'] . "</td>";
        echo "<td>" . $row['telephone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['immatriculation'] . "</td>";
        echo "<td>" . $row['marque_voiture'] . "</td>";

        // Ajoutez d'autres cellules de données ici si nécessaire
        echo "</tr>";
    }
    ?>
</table>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: gray;
        color: white;
    }
    h3{
        display: flex;
        align-items: center;
        justify-content: center;
        padding-bottom: 30px;
        padding-top: 20px;
        text-decoration: underline;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
    

</body>
</html>

