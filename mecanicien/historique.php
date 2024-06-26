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

    $sql = "SELECT * FROM historique ";
    $stmt = $pdo ->query($sql);
    $stmt ->execute();
    print "<h3><b> Historique de Depannage</b>:".$stmt-> rowCount()."</h3>";

    ?>
    <table>
    <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Nom</th>
        <th>Immatriculation</th>
        <th>Panne</th>
        <th>Produit</th>
        <th>Montant</th>



        <!-- Ajoutez d'autres en-têtes de colonnes ici si nécessaire -->
    </tr>
    <?php
    while ($row = $stmt -> fetch( PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['date_facture'] . "</td>";
        echo "<td>" . $row['nom_chauffeur'] . "</td>";
        echo "<td>" . $row['immatriculation'] . "</td>";
        echo "<td>" . $row['panne'] . "</td>";
        echo "<td>" . $row['produit'] . "</td>";
        echo "<td>" . $row['total_ligne'] . "</td>";

        // Ajoutez d'autres cellules de données ici si nécessaire
        echo "</tr>";
    }
    ?>
</table>

<button class="button"><a href="./meca-dashboard.html">Acceuil</a></button>

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
    .button {
        margin-top: 30px;
        padding: 5px 20px 5px 20px;
        position: relative;
        left: 45%;
        background-color: gray;
    }
    .button a {
        color: white;
        text-decoration: none;

    }
    .button:hover {
        background-color: green;

    }
</style>
    

</body>
</html>

