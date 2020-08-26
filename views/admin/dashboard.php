<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->

<button id="toggleButton">afficher les soins</button>

<div id="myDIV" class="container container-flex">
    <h1 class="container">SOINS</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($soins as $soin) :?>
            <tr>

                <td><?= htmlentities($soin->getTitre()) ?></td>
                <td><?= htmlentities($soin->getContenu()) ?></td>
                <td><img class="miniImg" src="<?= htmlentities("public/img/soins/".$soin->getImage() )?>" alt=""></td>

                <td>
                    <a href="index.php?class=admin&action=editSoin&id=<?=$soin->getId()?>"> modifier </a>
                    <a href="index.php?class=admin&action=deleteSoin&id=<?=$soin->getId()?>">supprimer</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<a href="index.php?class=admin&action=ajouter">Ajouter un soin</a>

<script src="public/js/hidden_div.js"></script>
<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->