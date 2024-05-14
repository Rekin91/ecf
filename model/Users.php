<?php

class users {
public int $id;
public int $id_Role;
public string $name;
public string $email;
private string $password;


public function hydrate(array $data) {
    foreach ($data as $key => $value) {
        // Vérifier si la propriété existe avant de l'assigner
        if (property_exists($this, $key)) {
            $this->$key = $value;
        }
    }    
}
};

$pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', '');

$id= 3;

// Exécution de la requête pour récupérer les données de l'utilisateur
$query = $pdo->prepare("SELECT id, id_role, name, email FROM users WHERE id = :id");
$query->execute(['id' => $id]);
$userData = $query->fetch(PDO::FETCH_ASSOC);

// Création d'une instance de Utilisateur
$user = new Users();

// Remplissage de l'objet avec les données extraites de la base de données
$user->hydrate($userData);

// Vous pouvez maintenant utiliser les propriétés de l'objet $user
echo $user->id;
echo $user->name;
echo $user->email;
echo $user->id_Role;