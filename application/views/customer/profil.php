<div class="container mb-5">
<?php var_dump($_SESSION); ?>
    <h3 class="text-center mt-5">Profil</h3>

    <div class="col-12 bg-dark pt-5 pb-5 text-white">
        <div class="row">
            <div class="col-12 col-md-3"><img class="img-fluid" src="https://oasys.ch/wp-content/uploads/2019/03/photo-avatar-profil.png"></div>
            <div class="col-12 col-md-3">
                <p class="text-left text-white">Prenom : <?php echo $profil['firstname'] ?></p>
                <p class="text-left text-white">Nom : <?php echo $profil['lastname'] ?></p>
                <p class="text-left text-white">Date de naissance : <?php echo $profil['birth_date'] ?></p>
            </div>
            <div class="col-12 col-md-3">
                <p class="text-left text-white">Numéros de téléphone : <?php echo $profil['phone_number'] ?></p>
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
                if ($rent != null) {
                ?>
                        <p><?php echo $rent[0]->vehicle_model ?> <?php echo $rent[0]->name ?>- Date de début : <?php echo $rent[0]->start_date ?>- Date de fin : <?php echo $rent[0]->end_date ?></p>
                <?php

                } else {
                    echo "aucune locationa actuellement";
                    echo ("<br>");
                }
                ?>

            </div>
            <div class="col-12 col-md-6 bg-dark pt-5 pb-5 text-white">
                <h3>Historique</h3>
                <?php
                if ($rent != null) {
                    foreach ($rent as $rents) {
                ?>
                        <p><?php echo $rents->vehicle_model ?> <?php echo $rents->name ?>- Date de début : <?php echo $rents->start_date ?>- Date de fin : <?php echo $rents->end_date ?></p>
                <?php
                    }
                } else {
                    echo "ce client n'a eu aucune location";
                    echo ("<br>");
                }

                ?>
            </div>
        </div>
    </div>

</div>
