<!-- Section Footer-->
<footer class="footer pt-5 mt-5">
    <div class="container mt-3">
        <div class="row">
            <!-- Footer Localisation-->
            <div class="col-md-3 mb-5 mb-md-0">
                <h4 class="text-uppercase">Adresse</h4>
                <p>
                    Loca-Auto &mdash; La Manu
                    <br />
                    70, rue des Jabobins
                    <br />
                    80000 Amiens
                </p>
                <h4 class="text-uppercase">Horaires</h4>
                <p>
                    Lundi &mdash; Vendredi : 8h &mdash; 17h.
                    <br />
                    Samedi : 8h &mdash; 12h.
                </p>
            </div>
            <!-- Footer Compte-->
            <div class="col-md-3 mb-5 mb-md-0" id="compte">
                <h4 class="text-uppercase">Mon compte</h4>
                <ul>
                    <li><a href="<?= site_url('Customer_controller/register/') ?>">S'inscrire</a></li>
                    <li><a href="<?= site_url('Customer_controller/connect/') ?>">Se connecter</a></li>
                    <li><a href="">Mot de passe oublié</a></li>
                    <!-- <li><a href="">Déposer un véhicule</a></li> -->
                </ul>
            </div>
            <!-- Footer Sécurité-->
            <div class="col-md-3 mb-5 mb-md-0" id="agence">
                <h4 class="text-uppercase">L'agence Loca-Auto</h4>
                <ul>
                    <li><a href="">Politique de confidentialité</a></li>
                    <li><a href="">Mentions légales</a></li>
                    <li><a href="">Gestion des cookies</a></li>
                    <li><a href="">CGU/CGV</a></li>
                </ul>
            </div>
            <!-- Footer Contact & Social Icons-->
            <div class="col-md-3 mb-5 mb-md-0">
                <h4 class="text-uppercase mb-4">Réseaux sociaux</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>

                <h4 class="text-uppercase my-4">Nous contacter</h4>
                <p>tél. : 0606060606</p>

            </div>
        </div>
        <div>
            <p>&copy;2021 Loca-Auto. &mdash; Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/script.js"></script>
</body>

</html>