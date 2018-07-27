<?php
require_once '../../../model/database.php';

$id = $_GET["id"];
$projet = getOneEntity("projet", $id);

$list_categories = getAllEntities("categorie");

require_once '../../layout/header.php';


?>

<h1>Modifier une Projet</h1>

<form action="update_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Titre</label>
        <div class="col-sm-10">
            <input type="text" name="titre" value="<?php echo $projet["titre"]; ?>" class="form-control" placeholder="Titre">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-1 col-form-label">
            <img src="../../../uploads/<?php echo $projet["image"]; ?>" alt="" class="img-responsive img-thumbnail">
        </div>
        <div class="col-sm-9">
            <input type="file" name="image" accept="images/*" class="form-control">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Date de Création</label>
        <div class="col-sm-10">
            <input type="date" name="date_creation" value="<?php echo $projet["date_creation"]; ?>" class="form-control" placeholder="">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Date de Fin</label>
        <div class="col-sm-10">
            <input type="date" name="date_fin" value="<?php echo $projet["date_fin"]; ?>" class="form-control">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Objectif à atteindre</label>
        <div class="col-sm-10">
            <input type="number" name="objectif" value="<?php echo $projet["objectif"]; ?>" class="form-control">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control">
                <?php echo $projet["description"]; ?>
            </textarea>
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Catégorie</label>
        <div class="col-sm-10">
            <select name="categorie_id" class="form-control">
                <?php foreach ($list_categories as $categorie) : ?>
                    <?php $selected = ($categorie["id"] == $projet["categorie_id"]) ? "selected" : ""; ?>
                <option value=" <?php echo $categorie["id"]; ?> " <?php echo $selected; ?>>
                        <?php echo $categorie["libelle"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit" class="btn btn-success float-right">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>