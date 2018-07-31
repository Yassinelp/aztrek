<?php
function getAllProjects(int $limit = 999): array {
    global $connexion;
    $query= "SELECT 
                projet.*,
                DATE_FORMAT(projet.date_creation, '%d/%m/%Y') AS date_creation_format,
                REPLACE(FORMAT(projet.objectif, 'currency', 'de_DE'), '.', ' ') AS objectif_format,
                categorie.libelle AS categorie,
                COUNT(participation.id) AS nb_participations,
                IFNULL(SUM(participation.montant), 0) AS montant_participations,
                AVG(notation.note) AS note_moyenne
            FROM projet
            INNER JOIN categorie ON categorie.id = projet.categorie_id
            LEFT JOIN participation ON participation.projet_id = projet.id
            LEFT JOIN notation ON notation.projet_id = projet.id
            GROUP BY projet.id
            ORDER BY projet.date_creation DESC
            LIMIT :limit";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":limit", $limit);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getProject(int $id = 999): array {
    global $connexion;
    $query= "SELECT 
                projet.*,
                DATE_FORMAT(projet.date_creation, '%d/%m/%Y') AS date_creation_format,
                REPLACE(FORMAT(projet.objectif, 'currency', 'de_DE'), '.', ' ') AS objectif_format,
                categorie.libelle AS categorie,
                COUNT(participation.id) AS nb_participations,
                IFNULL(SUM(participation.montant), 0) AS montant_participations,
                AVG(notation.note) AS note_moyenne
            FROM projet
            INNER JOIN categorie ON categorie.id = projet.categorie_id
            LEFT JOIN participation ON participation.projet_id = projet.id
            LEFT JOIN notation ON notation.projet_id = projet.id
            WHERE projet.id = :id;";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function insertProjet(string $titre, string $image, string $date_creation, string $date_fin, string $objectif, string $description, string $categorie_id): int{
    /* @var $connexion PDO */
    global $connexion;
    
    $query = "INSERT INTO projet (titre, image, date_creation, date_fin, objectif, description, categorie_id) VALUES (:titre, :image, :date_creation, :date_fin, :objectif, :description, :categorie_id)";
    
    $stmt= $connexion->prepare($query);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":date_creation", $date_creation);
    $stmt->bindParam(":date_fin", $date_fin);
    $stmt->bindParam(":objectif", $objectif);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":categorie_id", $categorie_id);
    $stmt->execute();
    
    return $connexion->lastInsertId();
}

function updateProjet(int $id, string $titre, string $image, string $date_creation, string $date_fin, string $objectif, string $description, string $categorie_id): int{
    /* @var $connexion PDO */
    global $connexion;
    
    $query = "UPDATE projet 
                SET titre = :titre,
                    image = :image,
                    date_creation = :date_creation,
                    date_fin = :date_fin,
                    objectif = :objectif,
                    description = :description,
                    categorie_id = :categorie_id
            WHERE id = :id
            ";

                   
    $stmt= $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":date_creation", $date_creation);
    $stmt->bindParam(":date_fin", $date_fin);
    $stmt->bindParam(":objectif", $objectif);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":categorie_id", $categorie_id);
    $stmt->execute();
    
    return $connexion->lastInsertId();
}
