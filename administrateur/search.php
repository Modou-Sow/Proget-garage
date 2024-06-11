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

    $sql = "SELECT * FROM locations ";
    $stmt = $pdo ->query($sql);
    $stmt ->execute();
    print "<h3><b>Number of students found</b>:".$stmt-> rowCount()."</h3>";

while ($row = $stmt -> fetch( PDO::FETCH_ASSOC)){
    print "<dl>";

        print "<dt>Locataire</dt>"; 
        print "<dd>".$row['username']."</dd>";

        print "<dt>Addresse </dt>"; 
        print "<dd>".$row['addresse']."</dd>";
        
        print "<dt> Numero</dt>"; 
        print "<dd>".$row['numero']."</dd>";
        
        print "<dt>Prix</dt>"; 
        print "<dd>".$row['prix']."</dd>";

}

?>
</body>
</html>
