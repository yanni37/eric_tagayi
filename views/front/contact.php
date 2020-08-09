<?php require_once 'views/header.php' ?>

<main class="container_form white">

    <section class="section-contact container" >
        <h2 class="section-title flex-cell-full">Contactez-moi</h2>
        <form class="container-flex" action="" method="post" id="contact">

            <label for="email">Votre e-mail:</label>
            <input class="flex-cell-full" type="email" name="email" id="email" required>
            <label for="sujet">Sujet:</label>
            <input class="flex-cell-full" type="sujet" name="sujet" id="sujet" required>

            <label for="contenu"> Votre message: </label>
            <textarea class="flex-cell-full" name="contenu" id="contenue" cols="30" rows="10" required></textarea>

            <input name="send" id="submit" type="submit" value="Envoyer message" class="fields">
        </form>

</main>

<section class="container ">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="public/img/cab_1.png" />
                    </li>
                    <li>
                        <img src="public/img/cab_2.png" />
                    </li>
                    <li>
                        <img src="public/img/cab_3.png" />
                    </li>
                </ul>
            </div>
        </section>





<?php require_once 'views/front/footer.php' ?>