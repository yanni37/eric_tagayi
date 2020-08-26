<footer>
    <nav>
        ©2020 - tous droits réservés l
        <a href="#">Mentions légales</a>
        l
        <a href="#"> Crédits </a>
        l
        <button type="button" aria-haspopup="dialog" aria-controls="dialog">Espace admin</button>
    </nav>
    
        <!-- FENETRE MODAL POUR CONNEXION ADMIN -->

        <div id="dialog" role="dialog" aria-labelledby="dialog-title" aria-describedby="dialog-desc" aria-modal="true"
            aria-hidden="true" tabindex="-1" class="c-dialog">
            <div role="document" class="c-dialog__box">
                <button type="button" aria-label="Fermer" title="Fermer cette fenêtre modale"
                    data-dismiss="dialog">X</button>
                <h2 id="dialog-title">Connexion Espace Admin </h2>
                <p id="dialog-desc">accédez simplement à vos messages et vos articles</p>
                <form class="container-flex" action="index.php?class=user&action=login" method="post">
                    <p>
                        <label for="mail">Email</label><br />
                        <input class="flex-cell-full" type="email" name="mail" id="mail" required />
                    </p>
                    <p>
                        <label for="password">Mot de passe</label><br />
                        <input class="flex-cell-full" type="password" name="password" id="password" required />
                    </p>
                    <p>
                        <button type="submit" name="valider" id="valider" value="valider" class="btn btn-pink"> Valider
                        </button>
                    </p>
                    <p>
                        <button type="reset" class="btn btn-lightgrey">Annuler</button>
                    </p>
                </form>
            </div>
        </div>
    
</footer>

    <!-- JavaScript  -->
<script src="public/js/ajax.js"></script>
<script src="public/js/app.js"></script>
<script src="public/js/sticky_header.js"></script>
<script src="public/js/login_modal.js"></script>

</body>

</html>