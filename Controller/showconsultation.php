<?php

    require 'vendor/autoload.php';

    use MongoDB\Client;

    function dbToTable(){
    
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->ecf;
        $collection = $database->dashboard;
        
        // Récupérer tous les documents de la collection
        $result = $collection->find();
    
        // Convertir les résultats en un tableau PHP
        $documents = iterator_to_array($result);
    
        // Fonction de comparaison pour trier les documents en fonction de la valeur 'view'
        usort($documents, function($a, $b) {
            return $b['view'] - $a['view']; // Trie par ordre décroissant
        });
    
        // Afficher les documents triés dans un tableau HTML
        echo "<table class=\"table\">";
        echo "<thead class=\"thead-dark\">" ;
        echo '<tr><th>Race</th><th>Vue</th></tr>';
        foreach ($documents as $document) {
            echo '<tr>';
            echo '<td>' . $document['race'] . '</td>';
            echo '<td>' . $document['view'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }