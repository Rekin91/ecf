<?php


function getAllHistoFoods(){
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', '');
    $statement = $pdo->prepare('SELECT * FROM histofood');
    $statement->execute();
    
     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $histofood = new histofoods(
        $row["id"],
        $row["id_animal"],
        $row["food"],
        $row["gramfood"],
        $row["passdate"],
    );
    $histofoods[] = $histofood;
    } 
   return $histofoods;
}
$histofoods = getAllHistoFoods();


function showHistoFoodById() {

        $id = $_GET['id'];   

    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', '');
    $statement = $pdo->prepare('SELECT * FROM histofood WHERE id_animal=(:id)');
    $statement->bindParam(":id", $id);

    if ($statement->execute()) {
        $histofoods = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($histofoods)){ ?>
                          <hr>
                    <?php foreach ($histofoods as $histofood){
                     echo "<div>";   
                     echo "Animal ID: ". $histofood['id_animal']." /// "; 
                     echo "Aliment: ".$histofood['food']." /// "; 
                     echo "Quantité: ".$histofood['gramfood']."g"." /// "; 
                     echo "Date: ".$histofood['passdate']." /// "."<hr>" ;
                     echo "</div>";
                        
                     } 
                
            "</div>";
         }
    }
}



    
