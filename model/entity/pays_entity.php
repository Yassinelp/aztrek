<?php

function insertCategorie(string $libelle): int{
    /* @var $connexion PDO */
    global $connexion;
    
    $query = "INSERT INTO categorie (libelle) VALUES (:libelle)";
    
    $stmt= $connexion->prepare($query);
    $stmt->bindParam("libelle", $libelle);
    $stmt->execute();
    
    return $connexion->lastInsertId();
}

function updateCategorie(int $id, string $libelle){
    /* @var $connexion PDO */
    global $connexion;
    
    $query = "UPDATE categorie SET libelle = :libelle WHERE id = :id";
    
    $stmt= $connexion->prepare($query);
    $stmt->bindParam("id", $id);
    $stmt->bindParam("libelle", $libelle);
    $stmt->execute();
}