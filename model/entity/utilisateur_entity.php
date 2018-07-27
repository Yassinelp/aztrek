<?php


function getOneUtilisateurByEmailPassword(string $email, string $password){
    global $connexion;
    
    $query = "SELECT * FROM utilisateur WHERE email = :email AND password = SHA1(:password)";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    
    return $stmt->fetch();
}

function insertUtilisateur(string $nom, string $prenom, string $email, string $password, string $photo): int {
    global $connexion;
    
    $query = "INSERT INTO utilisateur (nom, prenom, email, password, photo, admin) VALUES (:nom, :prenom, :email, SHA1(:password), :photo, 0);";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":photo", $photo);
    $stmt->execute();
    
    return $connexion->lastInsertId();
}