<div class="container mb-5 opacity">
    <h2 class="my-3 pt-3">Catalogue de véhicules</h2>
    <div class="row py-5">
        <?php
        foreach ($vehicles as $vehicle) {
        ?>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <img src="<?= base_url(); ?>assets/images/<?= $vehicle['Image']; ?>" alt="<?= $vehicle['Mark'] . ' ' . $vehicle['Model']; ?>">
                    <div class="card-body">
                        <p class="card-text"><?= $vehicle['Description']; ?></p>
                        <a href="<?= base_url(); ?>index.php/Vehicle_controller/viewVehicle/<?= $vehicle['idVehicle']; ?>" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>