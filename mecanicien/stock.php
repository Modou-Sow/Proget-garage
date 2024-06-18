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

    $sql = "SELECT * FROM stock ";
    $stmt = $pdo ->query($sql);
    $stmt ->execute();
    print "<h3><b>Number of students found</b>:".$stmt-> rowCount()."</h3>";

while ($row = $stmt -> fetch( PDO::FETCH_ASSOC)){
    print "<dl>";

        print "<dt>Id</dt>"; 
        print "<dd>".$row['produit']."</dd>";

        print "<dt>ISBN number </dt>"; 
        print "<dd>".$row['prix']."</dd>";
        
        // print "<dt>Titre</dt>"; 
        // print "<dd>".$row['title']."</dd>";
        
        // print "<dt>Annee de publication</dt>"; 
        // print "<dd>".$row['pubyear']."</dd>";

        // print "<dt>Edition</dt>"; 
        // print "<dd>".$row['edition']."</dd>";

}

?>
</body>
</html>
