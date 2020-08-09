    <!-- HEADER -->
    <?php require_once "views/header.php"; ?>
    <!-- HEADER -->

    <!-- MAIN -->

    <main class="white">
        <?php foreach ($soins as $listeSoins): ?>
        <section class="container container-flex center">
            <?php foreach ($listeSoins as $soin): ?>
            <div class="flex-cell-one-third item">
                <h3 class="item-title"><?= htmlentities($soin->getTitre()) ?></h3>
                <img class="miniImg" src="public/img/soins/<?= $soin->getImage() ?>" alt="soins_1">
                <p class="item-text"> <?= htmlentities($soin->getContenu()) ?></p>
            </div>
            <?php endforeach; ?>
        </section>
        <?php endforeach; ?>
        
        <!-- FOOTER -->
        <?php require_once "views/front/footer.php"; ?>
        <!-- FOOTER -->