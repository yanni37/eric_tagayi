<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->

<h2 class="container"> Ajouter un article </h2>
<form class="container container-flex" action="" method="post" enctype="multipart/form-data">

<table>
    <tbody>
        <tr>
            <td><label for="name">titre :</label></td>
            <td><input class="flex-cell-full" type="text" name="titre" id="titre"></td>
        </tr>
        <tr>
            <td><label for="category">categories : </label></td>
            <td><select class="flex-cell-full" name="category" id="category">
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->getId() ?>"><?= $category->getNom() ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="contenu">contenu :</label></td>
            <td><textarea class="flex-cell-full" name="contenu" id="contenu" cols="30" rows="10"></textarea><br></td>
        </tr>
        <tr>
            <td><label for="image">image :</label></td>
            <td><input class="flex-cell-full" type="file" name="image" id="image"><br></td>
        </tr>
    </tbody>
</table>
<input class="flex-cell-full" type="submit" value="Enregistrer">
</form>

<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->