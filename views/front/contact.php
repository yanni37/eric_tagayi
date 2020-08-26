<?php require_once 'views/header.php' ?>

<main class="container_form white">

    <section class="section-contact container" >
        <h2 class="section-title flex-cell-full">Contactez-moi</h2>
        <form class="container-flex" method="post" id="contact">

            <label for="email">Votre e-mail:</label>
            <input class="flex-cell-full" type="email" name="email" id="email" required>
            <label for="sujet">Sujet:</label>
            <input class="flex-cell-full" type="text" name="sujet" id="sujet" required>

            <label for="contenu"> Votre message: </label>
            <textarea class="flex-cell-full" name="contenu" id="contenu" cols="30" rows="10" required></textarea>

            <input name="send" id="submit" type="submit" value="Envoyer message" class="fields">
        </form>
    </section>
</main>

<section class="container ">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img alt="cab_1" src="public/img/cab_1.png" />
                    </li>
                    <li>
                        <img alt="cab_2" src="public/img/cab_2.png" />
                    </li>
                    <li>
                        <img alt="cab_3" src="public/img/cab_3.png" />
                    </li>
                </ul>
            </div>
        </section>





<?php require_once 'views/front/footer.php' ?>