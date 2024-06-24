<?php

    // Check if the form has been submitted
    if (isset($_POST['search-bar'])) {
        $searchTerm = strtolower($_POST['search-bar']);

        // Connect to the database (replace with your credentials)
        $db = new mysqli('localhost', 'root', '', 'ndongofall');

        // Check connection
        if ($db->connect_error) {
            die('Erreur de connexion à la base de données : ' . $db->connect_error);
        }

        // Prepare and execute SQL query
        $sql = "SELECT * FROM vhch WHERE immatriculation LIKE '%$searchTerm%'";
        $result = $db->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) 
        {
            echo "<h2> INFORMATIONS </h2>"; 
            
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
    while ($row = $result->fetch_assoc()) {
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
    h2{
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
        } 
        else {
            header('Location: vehicule_chauffeur.html'); // Replace with your success page URL
            echo "<p>Aucun résultat trouvé pour '$searchTerm'.</p>";
        }

        // Close database connection
        $db->close();
    }
?>


