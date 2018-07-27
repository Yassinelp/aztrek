<?php
require_once 'lib/functions.php';
$utilisateur = current_user();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ecolidaire - <?php echo $title; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <header class="site-header">
            <div class="cta-header">
                <div class="container">
                    <ul class="cta-contact inline-list">
                        <li>Téléphone : <a href="tel:0123456789">0123456789</a></li>
                        <li>Email : <a href="mailto:contact@ecolidaire.fr">contact@ecolidaire.fr</a></li>
                    </ul>
                    <div class="cta-social">
                        <ul class="inline-list">
                            <?php if (empty($utilisateur)) : ?>
                                <li>
                                    <a href="admin/register.php">
                                        <i class="fa fa-user-plus"></i>
                                        Créer un compte
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/login.php">
                                        
                                        <i class="fa fa-sign-in"></i>
                                        Se connecter
                                    </a>
                                </li>
                            <?php else: ?>
                                <?php if ($utilisateur["admin"] == 1) : ?>
                                    <li>
                                        <p>Bonjour <?php echo $utilisateur["prenom"] . " " . $utilisateur["nom"]; ?></p>
                                        <a href="admin/">
                                            <i class="fa fa-cogs"></i>
                                            Administration
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <p>Bonjour <?php echo $utilisateur["prenom"] . " " . $utilisateur["nom"]; ?></p>
                                    <a href="admin/logout.php">
                                        <i class="fa fa-sign-out"></i>
                                        Déconnexion
                                    </a>
                                </li>
                            <?php endif; ?>
                                <a href="http://www.facebook.com">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.twitter.com">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container main-header">
                <a href="index.html" class="logo">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <?php require_once 'layout/nav.php'; ?>
            </div>
        </header>

        <main>
