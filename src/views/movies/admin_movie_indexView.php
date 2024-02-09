<?php get_header('Liste des films', 'admin'); ?>

<h2>Liste des films</h2>

<a href="<?= $router->generate('addMovie'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Films</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($movies as $movie) { ?>
            <tr>
                <td class="align-middle"><?= $movie->title; ?></td>
                <td class="text-center align-middle">
                    <a class='btn btn-warning'href="<?= $router->generate('editMovie', ['id' =>  $movie->id]); ?>">Editer</a>
                    <a class='btn btn-danger'href="<?= $router->generate('deleteMovie', ['id' =>  $movie->id]); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>