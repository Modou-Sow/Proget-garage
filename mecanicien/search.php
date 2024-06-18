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
        $sql = "SELECT * FROM locations WHERE username LIKE '%$searchTerm%'";
        $result = $db->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            echo "<h2>Résultats pour '$searchTerm':</h2>";

            while ($row = $result->fetch_assoc()) {
                // Display each matching record
                echo "<p>" . $row['username'] . "</p>";
                echo "<p>" . $row['addresse'] . "</p>";

            }
        } else {
            echo "<p>Aucun résultat trouvé pour '$searchTerm'.</p>";
        }

        // Close database connection
        $db->close();
    }
?>
