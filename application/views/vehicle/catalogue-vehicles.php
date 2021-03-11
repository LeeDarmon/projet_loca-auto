<div class="container opacity my-5">
    <h1 class="text-center mb-3" id="titleSection">Catalogue de véhicules</h1>
    <div class="row">
        <?php
        foreach ($vehicles as $vehicle) {
        ?>
            <div class="col-md-4 mb-5">
                <div class="card shadow-lg">
                    <img src="<?= base_url(); ?>assets/images/<?= $vehicle['Image']; ?>" alt="<?= $vehicle['Mark'] . ' ' . $vehicle['Model']; ?>" class="img-thumbnail">
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