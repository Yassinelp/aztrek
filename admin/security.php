<?php

session_start();

require_once __DIR__ . "/../model/database.php";

// L'utilisateur essai de se connecter
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Recherche l'utilisateur en BDD
    $utilisateur = getOneUtilisateurByEmailPassword($email, $password);
    
    if (isset($utilisateur["id"])) {
        $_SESSION["id"] = $utilisateur["id"];
    }
} else {
    // Si l'utilisateur est déjà connecté
    if (isset($_SESSION["id"])) {
        $utilisateur = getOneEntity("utilisateur",$_SESSION["id"]);
    }
}
// Si l'utilisateur n'est pas connecté
if (!isset($utilisateur["id"])) {
    header("Location: login.php");
} else if ($utilisateur["admin"] == 0) {
    // Si il est connecté mais pas admin
    header("Location: ../index.php");
}