<!-- HEADER -->
<?php require_once "views/header.php"; ?>
<!-- HEADER -->

<section class="container flexRow">

    <?php if ($error): ?>

        <span class="alert alert-danger"><?= $error ?></span>
    <?php endif; ?>
<section class="section-contact container" id="">
    <h2 class="section-title flex-cell-full"> Connectez-vous </h2>
    <form class="container-flex" action="index.php?class=user&action=login" method="post">
        
        <label for="mail">Votre e-mail:</label>
        <input class="flex-cell-full" type="email" name="mail" id="mail" required />
        
        <label for="password">Votre mot de passe:</label>
        <input class="flex-cell-full" type="password" name="password" id="password" required />
        
        <button type="submit" name="valider" id="valider" value="valider" class="btn btn-pink"> Valider </button>
        
        <button type="reset" class="btn btn-lightgrey">Annuler</button>

    </form>
</section>


</section>
<!-- FOOTER -->
<?php require_once "views/front/footer.php"; ?>
<!-- FOOTER -->