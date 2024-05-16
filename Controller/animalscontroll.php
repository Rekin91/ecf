<?php

function getAllAntilopes(){
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM animals WHERE id_race = :id";  
    $id_race = 3 ;
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id_race);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $antilope = new Animals(
            $row['id'],
            $row['id_habitat'],
            $row['id_race'],
            $row['name'],
            $row['food'],
            $row['etat'],
            $row['details'],
            $row['passdate'],
            $row['gramfood'],
            $row['photos']
        );
    $antilopes[] = $antilope;
}
return $antilopes;
}
    $antilopes=getAllAntilopes();





function getAllLions(){
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM animals WHERE id_race = :id";  
    $id_Animals = 1;
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $lion = new Animals(
            $row['id'],
            $row['id_habitat'],
            $row['id_race'],
            $row['name'],
            $row['food'],
            $row['etat'],
            $row['details'],
            $row['passdate'],
            $row['gramfood'],
            $row['photos']
);
    $lions[] = $lion;
}
    return $lions;
};
    $lions=getAllLions();




    function getAllGirafes(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 4;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $girafe = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $girafes[] = $girafe;
    
    }
    return $girafes;
        }
    $girafes=getAllGirafes();



    
    function getAllGorilles(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 5;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gorille = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $gorilles[] = $gorille;
    
    }
    return $gorilles;
        }
    $gorilles=getAllGorilles();
    


    function getAllLeopards(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 7;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $leopard = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $leopards[] = $leopard;
    
    }
    return $leopards;
        }
    $leopards=getAllLeopards();



    function getAllSerpents(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 8;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $serpent = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $serpents[] = $serpent;
    
    }
    return $serpents;
        }
    $serpents=getAllserpents();




    function getAllCrocodiles(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 2;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $crocodile = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $crocodiles[] = $crocodile;
    
    }
    return $crocodiles;
        }
    $crocodiles=getAllCrocodiles();




    function getAllFlamands(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 9;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $flamand = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $flamands[] = $flamand;
    
    }
    return $flamands;
        }
    $flamands=getAllFlamands();




    function getAllRatons(){
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM animals WHERE id_race = :id";  
        $id_Animals = 6;
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_Animals, PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $raton = new Animals(
                $row['id'],
                $row['id_habitat'],
                $row['id_race'],
                $row['name'],
                $row['food'],
                $row['etat'],
                $row['details'],
                $row['passdate'],
                $row['gramfood'],
                $row['photos']
            );
        $ratons[] = $raton;
    
    }
    return $ratons;
        }
    $ratons=getAllRatons();
    

    function animalsToTable() {
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
        $query = "SELECT * FROM animals";
        $stmt = $pdo->query($query);
    
        
        echo "<table class=\"table\">";
        echo "<thead class=\"thead-dark\">" ;
        echo "<tr><th>id</th><th>id_habitat</th><th>Id_Race</th><th>Nom</th><th>Alimentation</th><th>État</th><th>Details</th><th>Date de passage</th><th>Alimentation(g)</th><th>Photos</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['id_habitat']."</td>";
            echo "<td>".$row['id_race']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['food']."</td>";
            echo "<td>".$row['etat']."</td>";
            echo "<td>".$row['details']."</td>";
            echo "<td>".$row['passdate']."</td>";
            echo "<td>".$row['gramfood']."</td>";
            echo "<td>".$row['photos']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    

    function getAllAnimals() {
            $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $query = "SELECT * FROM animals";  
            
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $animal = new Animals(
                    $row['id'],
                    $row['id_habitat'],
                    $row['id_race'],
                    $row['name'],
                    $row['food'],
                    $row['etat'],
                    $row['details'],
                    $row['passdate'],
                    $row['gramfood'],
                    $row['photos']
                );
            $animals[] = $animal;
        }
        return $animals;
        }
    $animals = getAllAnimals();

    