<div class="container mb-5">
    <h1 class="text-center mt-5" id="titleSection">Profil</h1>

    <div class="col-12 bg-dark pt-5 pb-5 text-white">
        <div class="row">
            <div class="col-12 col-md-3"><img class="img-fluid" src="https://oasys.ch/wp-content/uploads/2019/03/photo-avatar-profil.png"></div>
            <div class="col-12 col-md-3">
                <p class="text-left text-white">Prénom : <?php echo $profil['firstname'] ?></p>
                <p class="text-left text-white">Nom : <?php echo $profil['lastname'] ?></p>
                <p class="text-left text-white">Date de naissance : <?php echo $profil['birth_date'] ?></p>
            </div>
            <div class="col-12 col-md-3">
                <p class="text-left text-white">Numéro de téléphone : <?php echo $profil['phone_number'] ?></p>
                <p class="text-left text-white">Email : <?php echo $profil['email_cust'] ?></p>

            </div>
            <div class="col-12 col-md-3">
                <a href="<?php echo site_url('customer_controller/modify/' . $profil['id']); ?>"><button class="btn btn-success">Modifier profil</button></a>
            </div>
        </div>
    </div>

    <div class="col-12 bg-dark pt-5 pb-5 text-white mt-5">
        <div class="row">
            <div class="col-12 col-md-6 bg-dark pt-5 pb-5 text-white">
                <h3>Location actuelle</h3>
                <?php
                if ($actually != null) {
                    foreach ($actually as $actuallys) {
                ?>
                        <div class="row">
                        <div class="col-6"><img src="<?= base_url(); ?>assets/images/<?= $actuallys->url_image; ?>"alt="<?= $actuallys->markName . ' ' . $actuallys->vehicle_model; ?>" class="img-thumbnail"></div>
                        <p class="col-6"><?php echo $actuallys->vehicle_model ?> <?php echo $actuallys->markName ?>  Date de début : <?php echo $actuallys->start_date ?>- Date de fin : <?php echo $actuallys->end_date ?></p>
                        </div>
                <?php
                    }
                } else {
                    echo "Ce client n'a eu aucune location en historique";
                    echo ("<br>");
                }

                ?>
                <p class="text-danger mt-5">
                Un problème sur une location actuelle?<br>Veuillez nous contacter au mail contact@loca-auto.fr
                </p>

            </div>
            <div class="col-12 col-md-6 bg-dark pt-5 pb-5 text-white">
                <h3>Historique</h3>
                <?php
                if ($old != null) {
                    foreach ($old as $olds) {
                ?>
                        <p><?php echo $olds->vehicle_model ?> <?php echo $olds->markName ?>- Date de début : <?php echo $olds->start_date ?>- Date de fin : <?php echo $olds->end_date ?></p>
                        <hr class="text-white">
                <?php
                    }
                } else {
                    echo "Ce client n'a eu aucune location en historique";
                    echo ("<br>");
                }

                ?>
            </div>
        </div>
    </div>

</div>