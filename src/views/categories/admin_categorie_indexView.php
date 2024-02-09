<?php get_header('Liste des categories', 'admin'); ?>


<h2>Liste des Catégories</h2>

<a href="<?= $router->generate('addCat'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">catégorie</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cat as $cats) { ?>
            <tr>
                <td class="align-middle"><?= $cats->catName; ?></td>
                <td class="text-center align-middle">
                    <a class='btn btn-warning'href="<?= $router->generate('editCat', ['id' =>  $cats->id]); ?>">Editer</a>
                    <a class='btn btn-danger'href="<?= $router->generate('deleteCat', ['id' =>  $cats->id]); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php get_footer('admin'); ?>