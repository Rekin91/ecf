<?php 

// POUR UTILISER LA BDD NOSQL COUCHDB //

require_once '../vendor/autoload.php';

use PHPOnCouch\CouchClient;
use PHPOnCouch\Exceptions;

// Connexion à la base de données CouchDB avec nom d'utilisateur et mot de passe
$client = new CouchClient('http://couchdb-ecfpromo2024.alwaysdata.net:5984', 'ecfpromo2024_bddnosql', array('username' => 'ecfpromo2024', 'password' => 'coucoutoi'));

// ID du document
$documentId = 'cb3a4cae2b83cabe817c5d6eb600a483';
try {
// Récupérer le document
$document = $client->getDoc($documentId);
echo "Document récupéré : " . json_encode($document) . "\n";

$race = $_POST['animalId'] ;

// Parcourir les sections du document pour trouver la race
$found = false;
foreach ($document as $key => $value) {
    if (is_object($value) && isset($value->race) && $value->race === $race) {
        // Incrémenter l'attribut "view"
        $value->view += 1;
        $found = true;
        break;
    }
}

if ($found) {
    // Enregistrer le document mis à jour
    $response = $client->storeDoc($document);
    echo "Document mis à jour : " . json_encode($response) . "\n";
} else {
    echo "Race non trouvée dans le document.\n";
}
} catch (Exceptions\CouchException $e) {
echo "Erreur : " . $e->getMessage() . "\n";
}
echo "Document récupéré : " . json_encode($document) . "\n";





/*/ POUR UTILISER LA BDD NOSQL MONGODB //

require '../vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");

$database = $client->ecf;

$collection = $database->dashboard;

$race = $_POST['animalId'];



// Mettre à jour le compteur de consultations de l'animal
$updateResult = $collection->updateOne(
['race' => $race],
['$inc' => ['view' => 1]]
);
*/

