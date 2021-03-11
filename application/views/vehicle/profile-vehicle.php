<?php
// test
// $vehicle[0]['Dispo'] = 0;
?>
<div class="container mb-5 opacity">
    <h2 class="my-3 pt-3">Détails du véhicule</h2>
    <div class="row py-5">

        <div class="col-md-4">
            <div class="card shadow-lg">
                <img src="<?= base_url(); ?>assets/images/<?= $vehicle[0]['Image']; ?>" alt="<?= $vehicle[0]['Mark'] . ' ' . $vehicle[0]['Model']; ?>">
                <div class="card-body">
                    <h4 class="card-text"><?= $vehicle[0]['Mark']; ?> <?= $vehicle[0]['Model']; ?></h4>
                    <h5>Catégorie :</h5>
                    <p class="card-text"><?= $vehicle[0]['Type']; ?></p>
                    <h5>Nombre de places :</h5>
                    <p class="card-text"><?= $vehicle[0]['Places']; ?></p>
                    <h5>Description :</h5>
                    <p class="card-text"><?= $vehicle[0]['Description']; ?></p>
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
                        <div>
                            <a class="btn btn-success" href="<?= base_url(); ?>index.php/Rent_controller/addRent/">Louer ce véhicule</a>
                        </div>
                    <?php
                    }
                    ?>

                    <h2 class="text-right">
                        <span class="badge badge-primary"><?= $vehicle[0]['Forfait']; ?>&euro;/jour</span>
                    </h2>

                </div>
            </div>
        </div>

    </div>
</div>