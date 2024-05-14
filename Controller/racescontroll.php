<?php


function getAllRaces() {
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM races";  
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $race = new races(
            $row['id'],
            $row['label'],
        );
    $races[] = $race;
}
return $races;
}
$races = getAllRaces();
?>