<?php

function getAllParticipationsByProject (int $id): array{
    global $connexion;
    $query ="SELECT 
                utilisateur.nom,
                utilisateur.prenom,
                utilisateur.photo,
                participation.date_creation,
                participation.montant,
                participation.utilisateur_id
            FROM participation
            INNER JOIN utilisateur ON utilisateur.id = participation.utilisateur_id
            WHERE participation.projet_id = :id
            ORDER BY participation.date_creation DESC;";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getAllParticipationsByUtilisateur (int $id): array{
    global $connexion;
    $query ="SELECT 
                projet.titre,
                projet.image,
                participation.date_creation,
                participation.montant,
                participation.projet_id
            FROM participation
            INNER JOIN projet 
                    ON projet.id = participation.projet_id
            WHERE participation.utilisateur_id = :id
            ORDER BY participation.date_creation DESC;";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function insertParticipation(float $montant, int $projet_id, int $utilisateur_id): int {
    /* @var $connexion PDO */
    global $connexion;
    
    $query = "INSERT INTO participation (montant, date_creation, projet_id, utilisateur_id) VALUES (:montant, NOW(), :projet_id, :utilisateur_id);";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":montant", $montant);
    $stmt->bindParam(":projet_id", $projet_id);
    $stmt->bindParam(":utilisateur_id", $utilisateur_id);
    $stmt->execute();
    
    return $connexion->lastInsertId();
}