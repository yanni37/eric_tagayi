<!-- HEADER -->
<?php require_once "views/header.php"; ?>
<!-- HEADER -->

<section class="container flexRow">
    <section class="section-contact container" id="contact">
        <h2 class="section-title flex-cell-full"> Connectez-vous </h2>
        <form class="container-flex" action="" method="post" id="login_form">

            <label for="mail" class=""> Email: </label>
            <input class="flex-cell-one-half" type="email" name="mail" id="mail" required />

            <label for="password" class=""> Mot de passe : </label>
            <input class="flex-cell-one-half" type="password" name="password" id="password" required />

            <p><input type="submit" name="login" id="login" value="login" class="btn btn-pink"></p>

        </form>
    </section>

</section>

<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->