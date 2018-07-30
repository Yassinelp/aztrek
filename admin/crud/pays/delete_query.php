<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST["id"];

deleteEntity("categorie", $id);

header("Location: index.php");


