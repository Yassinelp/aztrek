<?php
require_once __DIR__ . '/../../config/parameters.php' ;
require_once __DIR__ . '/../../lib/functions.php';
require_once __DIR__ . '/../security.php' ; 
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Administration</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo SITE_ADMIN; ?>css/plugins.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo SITE_ADMIN; ?>css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo SITE_ADMIN; ?>">Ecolidaire | Admin</a>
      <ul class="navbar-nav flex-row px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo SITE_URL; ?>" target="_blank">
                <i class="fa fa-external-link"></i>
                FRONT
            </a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo SITE_ADMIN; ?>logout.php">
                <i class="fa fa-sign-out"></i>
                Déconnexion
            </a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <?php display_nav_item(SITE_ADMIN, "Dashboard", "fa-home", true); ?>
                <?php display_nav_item(SITE_ADMIN . "crud/categories/", "Catégories", "fa-tags"); ?>
                <?php display_nav_item(SITE_ADMIN . "crud/projets/", "Projets", "fa-leaf"); ?>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">