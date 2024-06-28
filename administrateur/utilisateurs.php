<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <link rel="stylesheet" href="bd.css">
    <title>Document</title>
</head>
<body>
<?php
    $pdo = new PDO ("mysql:host=localhost;dbname=ndongofall", "root" ,"");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM utilisateurs ";
    $stmt = $pdo ->query($sql);
    $stmt ->execute();
    print "<h3><b>Liste des pieces disponible</b>:".$stmt-> rowCount()."</h3>"; 
    
    ?>
    <table>

    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>

        <!-- Ajoutez d'autres en-têtes de colonnes ici si nécessaire -->
    </tr>
    <?php
    while ($row = $stmt -> fetch( PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";

        // Ajoutez d'autres cellules de données ici si nécessaire
        echo "</tr>";
    }
    ?>
</table>

<button class="button"><a href="./index.html">Acceuil</a></button>

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
        padding: 10px;
        background-color: gray;
        color: white;
    }
    h3{
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: underline;
        padding: 30px;
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
<?php

?>
</body>
</html>
