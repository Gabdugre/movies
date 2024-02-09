<?php get_header('Editer une categorie', 'admin'); ?>

<h1 class="mb-4">Editer une categorie</h1>



<form action="" method="post">
<div class="mb-4">
<?php $error = checkEmptyFields('catName'); ?>
    <label for="catName" class="form-label">Catégorie: *</label>
    <input type="text" name="catName" id="catName" value="<?= getValue('catName'); ?>" class="form-control <?= $error['class']; ?>">
    <?= $error['message']; ?>
    <?= $errorsMessage['catName'];?>
</div>

<div>
    <input type="submit" class="btn btn-success" value="Sauvegarder">
</div>
</form>

<?php get_footer('admin'); ?>