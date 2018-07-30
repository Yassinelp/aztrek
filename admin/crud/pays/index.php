<?php 
require_once '../../../model/database.php';

$list_categories = getAllEntities("categorie");

require_once '../../layout/header.php';
?>

<h1>Gestion des Catégories</h1>

<a href="insert_form.php" class="btn btn-primary">Ajouter une catégorie</a>

<hr>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_categories as $categorie): ?>
        <tr>
            <td><?php echo $categorie["libelle"]; ?></td>
            <td class="col-actions">
                <form action="delete_query.php" method="post" class="form-delete">
                    <input type="hidden" name="id" value="<?php echo $categorie["id"]; ?>">
                    <button type="submit" class="btn btn-danger" title="Supprimer">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
                <a href="update_form.php?id=<?php echo $categorie["id"]; ?>" class="btn btn-warning" title="Editer">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once '../../layout/footer.php'; ?>