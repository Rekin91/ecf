-- CREATION DES TABLES

CREATE TABLE roles (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL
);

CREATE TABLE habitats (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    avis VARCHAR(255) DEFAULT ''
);

CREATE TABLE services (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    horaires VARCHAR(255)
);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_role INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstlog TINYINT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_role) REFERENCES roles (id)
);

CREATE TABLE races (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL
);

CREATE TABLE animals (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_habitat INT NOT NULL,
    id_race INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    food VARCHAR(255) NOT NULL,
    gramfood INT NOT NULL,
    etat VARCHAR(255) NOT NULL,
    passdate DATETIME NOT NULL,
    details VARCHAR(255),
    photos VARCHAR(255),
    FOREIGN KEY (id_habitat) REFERENCES habitats (id),
    FOREIGN KEY (id_race) REFERENCES races (id)
);

CREATE TABLE histofood (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_animal INT NOT NULL,
    food VARCHAR(50) NOT NULL DEFAULT '',
    gramfood INT NOT NULL,
    passdate DATETIME NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animals (id)
);

CREATE TABLE histovet (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_animal INT NOT NULL,
    food VARCHAR(50) NOT NULL,
    gramfood INT NOT NULL,
    etat VARCHAR(255) NOT NULL,
    passdate DATETIME NOT NULL,
    details VARCHAR(255),
    FOREIGN KEY (id_animal) REFERENCES animals (id)
);

CREATE TABLE avis (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL,
    avis TEXT NOT NULL,
    validate TINYINT NOT NULL DEFAULT 0    
);

--  CREATION DES TRIGGERS

DELIMITER //

CREATE TRIGGER historique_nourriture
AFTER UPDATE
ON animals
FOR EACH ROW
BEGIN
    INSERT INTO histofood (id_animal, food, gramfood, passdate)
    VALUES (OLD.id, NEW.food, NEW.gramfood, NEW.passdate);
END//

CREATE TRIGGER historique_vet
AFTER UPDATE
ON animals
FOR EACH ROW
BEGIN
    INSERT INTO histovet (id_animal, food, gramfood, etat, passdate, details)
    VALUES (OLD.id, NEW.food, NEW.gramfood, NEW.etat, NEW.passdate, NEW.details);
END//

DELIMITER ;

-- INSERTION DES VALEURS

INSERT INTO roles (id, label) VALUES
(1, 'Visiteur'),
(2, 'Employe'),
(3, 'Veterinaire'),
(4, 'Admin');

INSERT INTO habitats (id, name, description, avis) VALUES
(1, 'savane', 'chaud et sec', 'trop chaud'),
(2, 'marais', 'tres humide', 'trop humide'),
(3, 'jungle', 'chaud et humide', 'tropical');

INSERT INTO services (id, name, description, horaires) VALUES
(2, 'visite guide', 'visite guidée du parc avec un expert', '9:00, 14:00'),
(3, 'restaurant', 'restaurant dans l\'enceinte du parc', '11:30 à 14:30'),
(28, 'Petit train', 'Petit train qui fait le tour du parc', '10:00, 14:00');

INSERT INTO users (id, id_role, email, password, firstlog) VALUES
(1, 3, 'veterinaire@email.fr', '$2y$10$/D.WFKu7CRT19u9DU5hH6eIhUQm3SDySut4Bjcu4rU0wMgapdJIay', 1),
(3, 2, 'employe1@email.fr', '$2y$10$hbj06j27cKzGqt6IrdDhuuCEA8BBa96eJlg8a2TyIRLPoyhiPVBs.', 1),
(4, 4, 'admin@email.fr', '$2y$10$P7FjV5j6kVY.P5Zi8HdSqe2ix6eeMKLJLxoXFvZjkcfNoyWrvVija', 1),
(7, 2, 'employe2@email.fr', '$2y$10$ZKlo6kGGzV/v1RpASSbgYek1C8xkbAqYiXw0jcD1kX/Xy3Z5t65hu', 0),
(8, 3, 'veterinaire2@email.fr', '$2y$10$Rx3lHna5OaFOIKFQmwKC5u1NpwQdnVqAGt7k3gpx2eUMBLsvwJlQG', 0);

INSERT INTO races (id, label) VALUES
(1, 'Lion'),
(2, 'Crocodile'),
(3, 'Antilope'),
(4, 'Girafe'),
(5, 'Gorille'),
(6, 'Raton'),
(7, 'Leopard'),
(8, 'Serpent'),
(9, 'Flamand');

INSERT INTO animals (id, id_habitat, id_race, name, food, gramfood, etat, passdate, details, photos) VALUES
(1, 3, 5, 'simba', 'bambou', 232, 'BON', '2024-05-03 16:58:00', 'Gros torse', 'https://zupimages.net/up/24/16/sip8.jpg'),
(2, 2, 4, 'milo', 'herbe', 100, 'BON', '2024-05-07 13:42:00', 'Grand cou', 'https://zupimages.net/up/24/16/5nqr.jpg'),
(3, 3, 7, 'Marsu', 'viande rouge', 320, 'BON', '2024-04-12 11:57:37', 'Jolie chaton', 'https://zupimages.net/up/24/16/nbi1.jpg'),
(4, 3, 8, 'ginger', 'poulet', 150, 'MOYEN', '2024-04-30 11:41:00', 'Vert fluo', 'https://zupimages.net/up/24/16/hics.jpg'),
(5, 1, 6, 'rocky', 'poulet', 800, 'excellent', '2024-05-06 14:26:00', 'tres bien manger', 'https://zupimages.net/up/24/16/n9wn.jpg'),
(6, 1, 9, 'molly', 'viande rouge', 440, 'moyen', '2024-05-16 14:32:00', 'tres gentil', 'https://zupimages.net/up/24/16/lu80.jpg'),
(7, 2, 1, 'daisy', 'viande rouge', 370, 'BON', '2024-04-12 12:03:14', 'Mechant', 'https://zupimages.net/up/24/16/p8k5.jpg'),
(8, 2, 3, 'bella', 'poisson', 70, 'tres bon', '2024-05-15 13:51:00', 'pas de détails', 'https://zupimages.net/up/24/16/fvz1.jpg'),
(9, 1, 2, 'luna', 'poisson', 290, 'BON', '2024-04-12 12:05:44', 'Apnee', 'https://zupimages.net/up/24/16/aktw.jpg'),
(10, 2, 3, 'max', 'poulet', 350, 'tres bon', '2024-05-15 13:47:00', 'reste au soleil', 'https://zupimages.net/up/24/16/yfq7.jpg');

INSERT INTO histofood (id, id_animal, food, gramfood, passdate) VALUES
(4, 8, 'steak', 225, '2024-05-01 11:40:00'),
(5, 4, 'cordon bleu', 150, '2024-04-30 11:41:00'),
(6, 2, 'pasta-box', 300, '2024-04-30 13:41:00'),
(7, 2, 'riz', 100, '2024-05-07 13:42:00'),
(11, 10, 'cote de boeuf', 400, '2024-05-08 15:01:00'),
(13, 5, 'steak haché', 800, '2024-05-06 14:26:00'),
(14, 6, 'élastique', 440, '2024-05-16 14:32:00'),
(15, 8, 'steak haché', 264, '2024-05-08 14:34:00'),
(16, 10, 'hamburger', 350, '2024-05-15 13:47:00'),
(17, 8, 'poisson', 70, '2024-05-15 13:51:00');

INSERT INTO histovet (id, id_animal, food, gramfood, etat, passdate, details) VALUES
(2, 8, 'steak haché', 264, 'excellent', '2024-05-08 14:34:00', 'a trop chaud dans son enclos'),
(4, 10, 'cote de boeuf', 400, 'tres bon', '2024-05-08 15:01:00', 'reste au soleil'),
(5, 6, 'viande', 440, 'moyen', '2024-05-16 14:32:00', 'tres gentil'),
(6, 5, 'steak haché', 800, 'excellent', '2024-05-06 14:26:00', 'tres bien manger'),
(7, 6, 'élastique', 440, 'moyen', '2024-05-16 14:32:00', 'tres gentil'),
(8, 8, 'steak haché', 264, 'excellent', '2024-05-08 14:34:00', 'a trop chaud dans son enclos'),
(9, 10, 'hamburger', 350, 'tres bon', '2024-05-15 13:47:00', 'reste au soleil'),
(10, 8, 'poisson', 70, 'tres bon', '2024-05-15 13:51:00', 'pas de détails');

INSERT INTO avis (id, pseudo, avis, validate) VALUES
(1, 'jean', 'michelle', 0),
(9, 'test', 'test', 0),
(10, 'jean-jacques', 'tres content', 0),
(14, 'Eric', 'Une journée au zoo est une véritable évasion ! Les enfants étaient émerveillés devant les animaux et les spectacles. Les enclos sont bien entretenus et les soigneurs passionnés. Une expérience éducative et divertissante pour toute la famille !', 1),
(15, 'kévin', 'Le zoo est un vrai bijou pour les amoureux de la nature ! Les espaces sont vastes et bien aménagés, offrant aux animaux un environnement proche de leur habitat naturel. Les spectacles sont impressionnants et nous ont permis de mieux comprendre le comportement des différentes espèces. Une journée enrichissante et mémorable', 1),
(16, 'Jeanne', 'Une journée au zoo est toujours une aventure incroyable ! Les enfants étaient fascinés par les animaux et les adultes tout autant. Les soigneurs sont passionnés et dévoués, et cela se ressent dans la santé et le bien-être des animaux. Une sortie parfaite pour se reconnecter avec la nature et soutenir la conservation des espèces en danger ', 1),
(17, 'testunefoisheberger', 'testunefoishéberger !', 0),
(18, 'Effmf', 'Trop bien', 0);