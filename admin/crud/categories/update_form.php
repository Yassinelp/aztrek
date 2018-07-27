<?php
require_once '../../../model/database.php';

$id = $_GET["id"];
$categorie = getOneEntity("categorie", $id);

require_once '../../layout/header.php';


?>

<h1>Modifier une Catégorie</h1>

<form action="update_query.php" method="post">
    <div class="form-group row">
        <label for="input-libelle" class="col-sm-2 col-form-label">Libellé</label>
        <div class="col-sm-10">
            <input type="text" name="libelle" class="form-control" placeholder="Libelle" value="<?php echo $categorie["libelle"]; ?>">
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit" class="btn btn-success float-right">
        <i class="fa fa-save"></i>
        Modifier et Enregistrer
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>