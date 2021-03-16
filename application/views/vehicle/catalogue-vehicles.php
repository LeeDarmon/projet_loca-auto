<div class="container my-5">
    <h1 class="text-center mb-3 opacity" id="titleSection">Catalogue de véhicules</h1>

    <div class="row justify-content-center">
    <?php $attributes = array('class' => 'form-inline my-2 my-lg-0 pb-3', 'id' => 'myform');

echo form_open('Vehicle_controller/search/',$attributes) ?>
    <input class="form-control" type="search" placeholder="Search for vehicle" name="model" aria-label="Search">
    <button class="btn btn-primary " type="submit"><i class="fas fa-search"></i></button>
</form>
    </div>

    <div class="row mb-5">
        <?php
        foreach ($vehicles as $vehicle) {
        ?>
            <div class="col-md-4 mb-5">
                <div class="card h-100 shadow-lg">
                    <img src="<?= base_url(); ?>assets/images/<?= $vehicle['Image']; ?>" alt="<?= $vehicle['Mark'] . ' ' . $vehicle['Model']; ?>" class="img-thumbnail img-fit">
                    <div class="card-body">
                        <p class="card-text"><?= $vehicle['Description'] = character_limiter($vehicle['Description'], 150); ?></p>
                        <a href="<?= base_url(); ?>index.php/Vehicle_controller/viewVehicle/<?= $vehicle['idVehicle']; ?>" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>