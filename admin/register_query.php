<?php
require_once '../model/database.php';

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$password = $_POST["password"];

// Upload de l'image

$photo = $_FILES["photo"]["name"];
$tmp = $_FILES["photo"]["tmp_name"];

move_uploaded_file($tmp, "../uploads/" . $photo);

insertUtilisateur($nom, $prenom, $email, $password, $photo);

header("Location: login.php");