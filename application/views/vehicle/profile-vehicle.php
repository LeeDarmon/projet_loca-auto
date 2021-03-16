<?php
// test
// $vehicle[0]['Dispo'] = 0;
?>
<div class="container my-5">
    <h1 class="text-center mb-3 opacity" id="titleSection">Détails du véhicule</h1>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card shadow-lg">
                <img src="<?= base_url(); ?>assets/images/<?= $vehicle[0]['Image']; ?>" alt="<?= $vehicle[0]['Mark'] . ' ' . $vehicle[0]['Model']; ?>" class="img-thumbnail">
                <div class="card-body">
                    <!-- Marque et modèle du véhicule -->
                    <h2 class="card-text"><?= $vehicle[0]['Mark']; ?> <?= $vehicle[0]['Model']; ?></h2>
                    <!-- badge forfait quotidien -->
                    <h2 class="text-right">
                        <span class="badge badge-primary"><?= $vehicle[0]['Forfait']; ?>&euro;/jour</span>
                    </h2>
                    <hr>
                    <!-- Catégorie -->
                    <h5>Catégorie :</h5>
                    <p class="card-text"><?= $vehicle[0]['Type']; ?></p>
                    <hr>
                    <h5>Nombre de places :</h5>
                    <p class="card-text"><?= $vehicle[0]['Places']; ?></p>
                    <hr>
                    <h5>Description :</h5>
                    <p class="card-text"><?= $vehicle[0]['Description']; ?></p>
                    <hr>
                    <h5>Disponibilité :</h5>
                    <?php
                    if ($vehicle[0]['Dispo'] == 0) { ?>
                        <p class="alert alert-danger">Ce véhicule n'est pas disponible pour le moment !</p>
                    <?php
                    } elseif ($vehicle[0]['Dispo'] == 1) { ?>
                        <p class="alert alert-warning">Il ne reste qu'un seul exemplaire disponible !</p>
                    <?php
                    } else {
                    ?>
                        <p class="card-text">Il reste <strong><?= $vehicle[0]['Dispo']; ?></strong> véhicules disponibles.</p>
                    <?php
                    }
                    ?>
                    <?php
                    if ($vehicle[0]['Dispo'] >= 1) {
                    ?>

                        <div class="mt-5">
                            <a class="btn btn-primary" href="
                            <?php if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
                                echo site_url('Rent_controller/addRent/' . $vehicle[0]['idVehicle']);
                            } else {
                                echo site_url('Customer_controller/connect/');
                            }
                            ?>
                            ">Je loue ce véhicule</a>
                        </div>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>

    </div>
</div>