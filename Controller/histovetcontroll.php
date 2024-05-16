<?php


function getAllHistovets(){
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $statement = $pdo->prepare('SELECT * FROM histovet');
    $statement->execute();
    
     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $histovet = new histovets(
        $row["id"],
        $row["id_animal"],
        $row["food"],
        $row["gramfood"],
        $row["passdate"],
        $row["details"],
    );
    $histovets[] = $histovet;
    } 
   return $histovets;
}
$histovets = getAllHistovets();


function showHistovetById() {

        $id = $_GET['id'];   

    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $statement = $pdo->prepare('SELECT * FROM histovet WHERE id_animal=(:id)');
    $statement->bindParam(":id", $id);

    if ($statement->execute()) {
        $histovets = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($histovets)){ ?>
                          <hr>
                    <?php foreach ($histovets as $histovet){
                     echo "<div>";   
                     echo "Animal ID: ". $histovet['id_animal']." /// "; 
                     echo "Aliment: ".$histovet['food']." /// "; 
                     echo "Quantité: ".$histovet['gramfood']."g"." /// "; 
                     echo "Date: ".$histovet['passdate']." /// ";
                     echo "Details: ".$histovet['details']." /// "."<hr>";
                     echo "</div>";
                        
                     } 
                
            "</div>";
         }
    }
}

function showHistovetByDate() {

    $date = $_GET['date'];   

$pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
$statement = $pdo->prepare('SELECT * FROM histovet WHERE DATE(passdate) = (:date)');
$statement->bindParam(":date", $date);

if ($statement->execute()) {
    $histovets = $statement->fetchAll(PDO::FETCH_ASSOC);


        if (!empty($histovets)){ ?>
                          <hr>
                    <?php foreach ($histovets as $histovet){
                     echo "<div>";   
                     echo "Animal ID: ". $histovet['id_animal']." /// "; 
                     echo "Aliment: ".$histovet['food']." /// "; 
                     echo "Quantité: ".$histovet['gramfood']."g"." /// "; 
                     echo "Date: ".$histovet['passdate']." /// ";
                     echo "Details: ".$histovet['details']." /// "."<hr>";
                     echo "</div>";
                        
                     } 
                
            "</div>";
         }
    }

}