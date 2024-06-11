<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="insert.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    
    <!-- <h2>Ajouter un nouveau Eleve</h2>
    <form action="insert.php" method="post">
        <strong>Nom :</strong><br>
        <input type="text" name="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>" placeholder="nom"><br><br>

        <strong> Mot de passe </strong><br>
        <input type="text" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];} ?>" placeholder="password" required><br><br>

        <strong> Email </strong><br>
        <input type="mail" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" placeholder="exemple@gmail.com" required><br><br>


        <input type="submit" class="btn btn-success" name="add_author" value="Ajouter l'auteur">
        <input type="submit" class="btn btn-success" style="background-color: red;" name="reset" value="Supprimer l'infos">
        <button style="background-color: white;" class="btn btn-success" ><a href="select.php">Liste Student</a></button>

   </form> -->

        <div class="form-container"> 
            <form action="insert.php" method="post">
                <h1>LOUER </h1>
                <div class="social-container">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <div class="style">

                    <div>
                        <label for="username">Nom locataire :</label><br><br>
                        <input type="text" id="username" name="username" required><br><br>
                    </div>

                    <div>
                        <label for="password">addresse :</label><br><br>
                        <input type="text" id="addresse" name="addresse" required><br><br>
                    </div>

                    <div>
                        <label for="password">Numero :</label><br><br>
                        <input type="number" id="numero" name="numero" required><br><br>
                    </div>

                    <div>
                        <label for="password">Prix :</label><br><br>
                        <input type="number" id="prix" name="prix" required><br><br>
                    </div> 
                </div>
            
                <button type="submit" name="add_author">Enregistrer</a></button>
                <button type="submit" class="button"><a href="./index.html">Acceuil</a></button>

            </form>
        </div>

    <?php 

    if(isset($_POST['add_author'])) {
        $pdo = new PDO("mysql:host=localhost;dbname=ndongofall", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $username = $_POST['username'];
        $addresse = $_POST['addresse'];
        $numero = $_POST['numero'];
        $prix = $_POST['prix'];

        
        $sql = "INSERT INTO locations (username,addresse,numero,prix) VALUES (:username, :addresse ,:numero,:prix)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':addresse', $addresse);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':prix', $prix);

        
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            echo "<p>Nouvel auteur ajouté avec succès.</p>"; 
        } else {
            echo "<p>Échec de l'ajout du nouvel auteur.</p>"; 
        }
    }

    ?>

    

</body>
</html>
