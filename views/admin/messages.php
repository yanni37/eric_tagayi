<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->

<div class="container container-flex">
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Sujet</th>
            <th>Action</th>
        </tr>

    </thead>
    <tbody>
        <?php foreach ($messages as $message): ?>

        <tr>
            <td><?= htmlentities($message->getDate()) ?></td>
            <td><?= htmlentities($message->getSujet()) ?></td>
            <td>
                <a href="index.php?class=admin&action=afficherMessage&id=<?= $message->getId() ?>">Afficher</a>
                <a href="index.php?class=admin&action=supprimerMessage&id=<?= $message->getId() ?>">Supprimer</a>
            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>


<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->