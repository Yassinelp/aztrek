<?php
require_once '../../../model/database.php';

$list_categories = getAllEntities("categorie");

require_once '../../layout/header.php';
?>

<h1>Ajouter un Projet</h1>

<form action="insert_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Titre</label>
        <div class="col-sm-10">
            <input type="text" name="titre" class="form-control" placeholder="Titre">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" accept="images/*" class="form-control">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Date de Création</label>
        <div class="col-sm-10">
            <input type="date" name="date_creation" class="form-control" placeholder="">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Date de Fin</label>
        <div class="col-sm-10">
            <input type="date" name="date_fin" class="form-control">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Objectif à atteindre</label>
        <div class="col-sm-10">
            <input type="number" name="objectif" class="form-control">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Catégorie</label>
        <div class="col-sm-10">
            <select name="categorie_id" class="form-control">
                <?php foreach ($list_categories as $categorie) : ?>
                <option value=" <?php echo $categorie["id"]; ?> ">
                        <?php echo $categorie["libelle"]; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success float-right">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>