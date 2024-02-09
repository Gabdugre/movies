<?php get_header('Editer un film', 'admin'); ?>

<main>
<form action="" method="post" enctype="multipart/form-data">
<div class="mb-4">
<?php $error = checkEmptyFields('title'); ?>
    <label for="title" class="form-label">Titre: *</label>
    <input type="text" name="title" id="title" value="<?= getValue('title'); ?>" class="form-control <?= $error['class']; ?>">
   
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('synopsis'); ?>
    <label for="synopsis" class="form-label">Synopsis: *</label>
    <textarea name="synopsis" id="synopsis" rows="3"  class="form-control <?= $error['class']; ?>"><?= getValue('synopsis'); ?></textarea>
   
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('casting'); ?>
    <label for="casting" class="form-label">Casting: *</label>
    <textarea name="casting" id="casting" class="form-control <?= $error['class']; ?>"><?= getValue('casting'); ?></textarea>
   
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('director'); ?>
    <label for="director" class="form-label">Direction: *</label>
    <input type="text" name="director" id="director" value="<?= getValue('director'); ?>" class="form-control <?= $error['class']; ?>">
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('release_date'); ?>
    <label for="date" class="form-label">Date: *</label>
    <input type="datetime" name="date" id="date" value="<?= getValue('release_date'); ?>" class="form-control <?= $error['class']; ?>">
</div>

<div class="mb-4">
<?php $error = checkEmptyFields('duration'); ?>
    <label for="duration" class="form-label">Durée: *</label>
    <input type="time" name="duration" id="duration" value="<?= getValue('duration'); ?>" class="form-control <?= $error['class']; ?>">
</div>

<div class="mb-4">
<?php $error = checkEmptyFields('photo'); ?>
    <label for="photo" class="form-label">Poster: *</label>
    <input type="file" name="photo" id="photo" value="<?= getValue('photo'); ?>" class="form-control <?= $error['class']; ?>">
</div>

<div class="mb-4">
<?php $error = checkEmptyFields('notePress'); ?>
    <label for="notePress" class="form-label">notePress: *</label>
    <input type="number" name="notePress" id="notePress" value="<?= getValue('notePress'); ?>" class="form-control <?= $error['class']; ?>">
</div>

<div class="mb-4">
<?php $error = checkEmptyFields('categorie'); ?>
<fieldset>
        <legend>Catégories:</legend>
        <!-- Afficher les catégories disponibles avec des cases à cocher -->
        <!-- (implémentation dépendante du langage et du framework utilisés) -->
        <?php
    
            foreach ($cat as $cats) {
          echo "$cat->catName";
                echo '<label>';
                echo '<?= $cat->catName; ?>';
                echo '<input type="checkbox" name="categorie[]" value="' . $cats['catName'] . '">';
                
                echo '</label>';
            }
            
        ?>
    </fieldset>
</div>
<div>
    <input type="submit" class="btn btn-success" value="Sauvegarder">
</div>
</form>
</main>
<?php get_footer('admin'); ?>
