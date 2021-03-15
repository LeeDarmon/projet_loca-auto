<div class="container opacity mb-5">

    <h1 class="text-center mt-5" id="titleSection">Location en cours</h1>


    <a class="btn btn-primary" href="<?= base_url() . 'index.php/Admin_controller/listVehicles' ?>">Liste des voitures</a>
    <a class="btn btn-primary" href="<?= base_url() . 'index.php/Admin_controller/listCustomers' ?>">Liste des clients</a>

    <?php
    foreach ($actually_rents as $actually_rent) {
    ?>

        <div class="row">
            <div class="col-12 col-md-1"><?= $actually_rent->rentId ?></div>
            <div class="col-12 col-md-3">
                <img src="<?= base_url() ?>assets/images/<?= $actually_rent->url_image ?>" alt="<?= $actually_rent->markName . ' ' . $actually_rent->vehicle_model ?>" class="img-thumbnail">
                <p><?= $actually_rent->markName ?> <?= $actually_rent->vehicle_model ?></p>
                <a href="<?= base_url() . "index.php/Vehicle_controller/viewVehicle/" . $actually_rent->vehicleId ?>" class="btn btn-primary" target="_blank">Voir Fiche</a>
            </div>
            <div class="col-12 col-md-3">
                <p><?= $actually_rent->firstname ?></p>
                <p><?= $actually_rent->lastname ?></p>
                <p><?= $actually_rent->phone_number ?></p>
                <p><?= $actually_rent->email_cust ?></p>
                <a href="<?= base_url() . 'index.php/Admin_controller/viewCustomer/' . $actually_rent->customerId ?>">Voir plus</a>
            </div>
            <div class="col-12 col-md-3">
                <p><?=date_format(date_create($actually_rent->start_date) , "d/m/Y")?> à <?= $actually_rent->locationStart ?>
                <p>
                <p>au</p>
                <p><?=date_format(date_create($actually_rent->end_date) , "d/m/Y")?> à <?= $actually_rent->locationEnd ?>
                <p>
                <p>Prix => <?= $actually_rent->cost ?>€</p>
            </div>
            <?php
            if($actually_rent->validated == 0){
                ?>
                <div class="col-12 col-md-2"><a href='<?= base_url() . "index.php/Rent_controller/valid_rent/" . $actually_rent->rentId ?>'>Valider</a>
                </div>
                <?php
            }else{
                echo '<div class="col-12 col-md-2">Location validé </div>';
            }
            ?>

        </div>
        <hr>

    <?php
    }
    ?>

    <h1 class="text-center mt-5" id="titleSection">Historique des locations</h1>
    <?php
    foreach ($old_rents as $old_rent) {
    ?>

        <div class="row">
            <div class="col-12 col-md-1"><?= $old_rent->rentId ?></div>
            <div class="col-12 col-md-3">
                <img src="<?= base_url() ?>assets/images/<?= $old_rent->url_image ?>" alt="<?= $old_rent->markName . ' ' . $old_rent->vehicle_model ?>" class="img-thumbnail">
                <p><?= $old_rent->markName ?> <?= $old_rent->vehicle_model ?></p>
                <a href="<?= base_url() . "index.php/Vehicle_controller/viewVehicle/" . $old_rent->vehicleId ?>" class="btn btn-primary" target="_blank">Voir Fiche</a>
            </div>
            <div class="col-12 col-md-3">
                <p><?= $old_rent->firstname ?></p>
                <p><?= $old_rent->lastname ?></p>
                <p><?= $old_rent->phone_number ?></p>
                <p><?= $old_rent->email_cust ?></p>
                <a href="<?= base_url() . 'index.php/Admin_controller/viewCustomer/' . $old_rent->customerId ?>">Voir plus</a>
            </div>
            <div class="col-12 col-md-3">
                <p><?=date_format(date_create($old_rent->start_date) , "d/m/Y")?> à <?= $old_rent->locationStart ?>
                <p>
                <p>au</p>
                <p><?=date_format(date_create($old_rent->end_date) , "d/m/Y")?> à <?= $old_rent->locationEnd ?>
                <p>
                <p>Prix => <?= $old_rent->cost ?>€</p>
            </div>

        </div>
        <hr>

    <?php
    }
    ?>

</div>