<?php

require_once __DIR__ . '/../config/parameters.php';

$connexion = new PDO("mysql:host=". DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET lc_time_names='fr_FR', NAMES utf8"
]);

// Inclure automatiquement les fichiers PHP positionnés dans le dossier "entity"
$entity_dir = __DIR__ . "/entity/";
$files = scandir($entity_dir);
foreach ($files as $file) {
    if (is_file($entity_dir . $file) && pathinfo($entity_dir . $file, PATHINFO_EXTENSION) == "php") {
        require_once $entity_dir . $file;
    }
}

function getAllEntities (string $table): array{
    global $connexion;
    
    $query = "SELECT * FROM $table";
    
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll();
}


function getOneEntity(string $table, int $id): array{
    global $connexion;
    
    $query = "SELECT * FROM $table WHERE id = :id";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function deleteEntity(string $table, int $id) {
    global $connexion;
    
    $query = "DELETE FROM $table WHERE id = :id";
    
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}