<div class="container-fluid mb-5">
    <h2 class="my-3">Détails du véhicule</h2>
    <div class="row py-5">

        <div class="col-md-4">
            <div class="card shadow-lg">
                <img src="<?= base_url(); ?>assets/images/<?= $vehicle[0]['Image']; ?>" alt="<?= $vehicle[0]['Mark'] . ' ' . $vehicle[0]['Model']; ?>">
                <div class="card-body">
                    <p class="card-text"><?= $vehicle[0]['Description']; ?></p>
                </div>
            </div>
        </div>

    </div>
</div>