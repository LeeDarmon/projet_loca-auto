<div class="container opacity mb-5">

    <h1 class="text-center mt-5" id="titleSection">Liste des vehicules</h1>

    <a class="btn btn-primary" href='<?= base_url() . "index.php/Admin_controller/" ?>'>Retour Accueil</a>

    <a class="btn btn-primary" href='<?= base_url() . "index.php/Admin_controller/addVehicle/" ?>'>Ajouter une voiture</a>

    <table class="bg-light">
        <tr>
            <th class="p-3">ID</th>
            <th class="p-3">Photo</th>
            <th class="p-3">Marque</th>
            <th class="p-3">Modele</th>
            <th class="p-3">Type</th>
            <th class="p-3">nbr de place</th>
            <th class="p-3">nbr dispo</th>
            <th class="p-3">prix / jour</th>
            <th class="p-3">ou</th>
        </tr>
        <?php
        foreach ($vehicles as $vehicle) {
        ?>

            <tr>
                <td class="p-3"><?= $vehicle['idVehicle'] ?></td>
                <td><img src="<?= base_url() ?>assets/images/<?= $vehicle['Image'] ?>" alt="<?= $vehicle['Mark'] . ' ' . $vehicle['Model'] ?>" class="img-thumbnail" width="100px"></td>
                <td class="p-3"><?= $vehicle['Mark'] ?></td>
                <td class="p-3"><?= $vehicle['Model'] ?></td>
                <td class="p-3"><?= $vehicle['Type'] ?></td>
                <td class="p-3"><?= $vehicle['Places'] ?></td>
                <td class="p-3"><?= $vehicle['Dispo'] ?></td>
                <td class="p-3"><?= $vehicle['Forfait'] ?></td>
                <td class="p-3"><?= $vehicle['namePark'] ?></td>
                <td class="p-3"><a href="<?= base_url() . 'index.php/Admin_controller/editVehicle/' . $vehicle['idVehicle'] ?>">Modifier</a></td>
                <td class="p-3"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?= $vehicle['idVehicle']; ?>">Suppr.</button></td>
            </tr>
            <div class="modal fade" id="exampleModal-<?= $vehicle['idVehicle']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir supprimer ce véhicule ?</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="<?= base_url() . 'index.php/Admin_controller/deleteVehicle/' . $vehicle['idVehicle'] ?>">Supprimer ?</a>
                            <button type="button" class="btn btn-secondaryy" data-dismiss="modal">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </table>

</div>