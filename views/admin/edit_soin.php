<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->


<form class="container" action="" method="post" enctype="multipart/form-data">

<table>
    <tbody>
        <tr>
            <td><label for="titre">titre :</label></td>
            <td><input class="flex-cell-full" type="text" name="titre" id="titre" value="<?= $soin->getTitre() ?>"></td>
        </tr>
        <tr>
            <td><label for="category">categories :</label></td>
            <td><select class="flex-cell-full" name="category" id="category">
        <?php foreach ($categories as $category): ?>
        <option value="<?= $category->getId() ?>" <?php if ($category->getId() == $soin->getCategory()): ?> selected
            <?php endif; ?>>
            <?= $category->getNom() ?>
        </option>
        <?php endforeach; ?>
    </select> 
            </td>
        </tr>
        <tr>
            <td><label for="contenu">contenu :</label></td>
            <td><textarea class="flex-cell-full" name="contenu" id="contenu" cols="30" rows="10"><?= $soin->getContenu() ?></textarea></td>
            
        </tr>
        <tr>
            <td><label for="image">image :</label></td>
            <td><input type="file" name="image" id="image"></td>
        </tr>
        <tr>
        <td>image actuel</td>    
        <td><img class="miniImg" src="<?= "public/img/soins/".$soin->getImage() ?>" alt=""></td>
        </tr>
    </tbody>
</table>
<input type="submit" value="Enregistrer">
</form>

<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->
