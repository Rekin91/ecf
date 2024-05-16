<?php


require_once 'vendor/autoload.php';
use PHPOnCouch\CouchClient;
use PHPOnCouch\Exceptions;

function dbToTable(){    
    
     {
        // Connexion à la base de données CouchDB avec nom d'utilisateur et mot de passe
        $client = new CouchClient('http://couchdb-ecfpromo2024.alwaysdata.net:5984', 'ecfpromo2024_bddnosql', array('username' => 'ecfpromo2024', 'password' => 'coucoutoi'));
    
        // ID du document
        $documentId = 'cb3a4cae2b83cabe817c5d6eb600a483';
    
        try {
            // Récupérer le document
            $document = $client->getDoc($documentId);
    
            // Extraire les sous-documents contenant les races et vues
            $subDocuments = [];
            foreach ($document as $key => $value) {
                if (is_object($value) && isset($value->race) && isset($value->view)) {
                    $subDocuments[] = $value;
                }
            }
    
            // Fonction de comparaison pour trier les documents en fonction de la valeur 'view'
            usort($subDocuments, function($a, $b) {
                return $b->view - $a->view; // Trie par ordre décroissant
            });
    
            // Afficher les documents triés dans un tableau HTML
            echo "<table class=\"table\">";
            echo "<thead class=\"thead-dark\">" ;
            echo '<tr><th>Race</th><th>Vue</th></tr>';
            foreach ($subDocuments as $doc) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($doc->race) . '</td>';
                echo '<td>' . htmlspecialchars($doc->view) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
    
        } catch (Exceptions\CouchException $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
        }
    }
}










// SI UTILISATION DE MONGO DB //

   /* //require 'vendor/autoload.php';

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
    } */