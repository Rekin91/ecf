<?php

function getAllOpinions() {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM avis";  
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $opinion = new opinions(
            $row['id'],
            $row['pseudo'],
            $row['avis'],
            $row['validate'],
        );
    $opinions[] = $opinion;
}
return $opinions;
}
$opinions = getAllOpinions();
