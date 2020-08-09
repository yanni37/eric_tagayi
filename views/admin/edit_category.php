<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->


<form class="container" action="" method="post">

    <label for="name">nom :</label>
    <input type="text" name="name" id="name" value="<?= $category->getNom() ?>">

    <input type="submit" value="Modifier">


</form>

<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->