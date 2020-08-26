<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->
<button id="toggleButton">afficher les categories</button>

<div id="myDIV" class="container container-flex">
<h2 class="container"> Gerer les categories </h2>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Action</th>
        </tr>

    </thead>
    <tbody>
        <?php foreach ($categories as $categorie): ?>

        <tr>
            <td><?= htmlentities($categorie->getNom()) ?></td>

            <td>
                <a href="index.php?class=category&action=editCategory&id=<?= $categorie->getId() ?>">Modifier</a>
                <a href="index.php?class=category&action=deleteCategory&id=<?= $categorie->getId() ?>">Supprimer</a>


            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>

</table>
</div>

<a href="index.php?class=category&action=addCategory&id=<?= $categorie->getId() ?>">ajouter un soin</a>

<script src="public/js/hidden_div.js"></script>
<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->