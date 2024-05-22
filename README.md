# ecf
 Site du ZOO ARCADIA


# Déploiement de l'application en local

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- [XAMPP](https://www.apachefriends.org/index.html) (inclut Apache, MySQL, PHP)
- [Node.js](https://nodejs.org/) (pour les paquets npm si nécessaire)
- [phpMyAdmin](https://www.phpmyadmin.net/) pour gérer les bases de données SQL
- [CouchDB](https://couchdb.apache.org/) ou [MongoDB](https://www.mongodb.com/) pour la base de données NoSQL
- [Composer](https://getcomposer.org/) (pour la gestion des dépendances PHP)

## Installation de XAMPP

1. Téléchargez et installez [XAMPP](https://www.apachefriends.org/index.html) en suivant les instructions du site officiel.
2. Lancez XAMPP Control Panel et démarrez les services Apache et MySQL.

## Configuration de la base de données SQL

### Avec phpMyAdmin

1. Ouvrez votre navigateur et accédez à `http://localhost/phpmyadmin`.
2. Créez une nouvelle base de données pour votre application.
3. Importez les tables nécessaires via l'onglet "Importer" vous avez un fichier SQL disponible dans le dossier BDD.

## Configuration de la base de données NoSQL

### CouchDB

1. Téléchargez et installez [CouchDB](https://couchdb.apache.org/).
2. Ouvrez l'interface web de CouchDB via `http://127.0.0.1:5984/_utils/`.
3. Créez une nouvelle base de données pour votre application.

### MongoDB

1. Téléchargez et installez [MongoDB](https://www.mongodb.com/).
2. Démarrez MongoDB en exécutant `mongod`.
3. Utilisez un client MongoDB comme [MongoDB Compass](https://www.mongodb.com/products/compass) pour créer une nouvelle base de données.

## Installation des dépendances PHP

### Phponcouch pour CouchDB

1. Assurez-vous d'avoir [Composer](https://getcomposer.org/) installé.
2. Naviguez dans le répertoire de votre projet.
3. Exécutez la commande suivante pour installer phponcouch :

   composer require php-on-couch/php-on-couch

### Exemple de configuration pour se connecter à CouchDB avec phponcouch :

```php
require 'vendor/autoload.php';

use PHPOnCouch\CouchClient;
use PHPOnCouch\Exceptions;

$client = new CouchClient('http://localhost:5984', 'nom_de_votre_base_de_donnees'  array('username' => 'yourusername', 'password' => 'yourpassword'));

try {
    $doc = $client->getDoc('some_doc_id');
    print_r($doc);
} catch (Exceptions\CouchNotFoundException $e) {
    echo "Document non trouvé\n";
}
```
### MongoDB pour PHP

1. Assurez-vous d'avoir Composer installé.
2. Naviguez dans le répertoire de votre projet.
3. Exécutez la commande suivante pour installer le client MongoDB pour PHP :

composer require mongodb/mongodb

### Exemple de configuration pour se connecter à MongoDB avec le client MongoDB pour PHP :

```php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->nom_de_votre_base_de_donnees->nom_de_votre_collection;

$document = $collection->findOne(['some_field' => 'some_value']);
print_r($document);
```

## Déploiement de l'application

1. Placez votre application dans le répertoire `htdocs` de XAMPP, généralement situé à `C:\xampp\htdocs\` sur Windows ou `/Applications/XAMPP/htdocs/` sur macOS.
2. Assurez-vous que votre fichier de configuration de base de données (par exemple `config.php`) contient les bonnes informations de connexion.

```php
// Exemple de configuration pour MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nom_de_votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
```

Ouvrez votre navigateur et accédez à http://localhost/nom_de_votre_dossier pour voir votre application en action.

### Technologies utilisées

- HTML : Pour la structure des pages web.
- CSS : Pour le style des pages web.
- Bootstrap : Pour un design réactif et des composants prêts à l'emploi.
- PHP : Pour le traitement côté serveur.
- JavaScript : Pour l'interactivité côté client.
- CouchDB ou MongoDB : Pour la base de données NoSQL.
- phpMyAdmin : Pour la gestion de la base de données SQL.


### Support

Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à ouvrir une issue ou à me contacter par email.