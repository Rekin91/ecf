<?php

function getAllHabitats() {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM habitats";  
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $habitat = new habitats(
            $row['id'],
            $row['name'],
            $row['description'],
            $row['avis']
        );
    $habitats[] = $habitat;
}
return $habitats;
}
$habitats = getAllhabitats();

function habitatsToTable() {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $query = "SELECT * FROM habitats";
    $stmt = $pdo->query($query);

    
    echo "<table class=\"table\">";
    echo "<thead class=\"thead-dark\">" ;
    echo "<tr><th>id</th><th>name</th><th>description</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>