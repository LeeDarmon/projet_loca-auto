<div class="container opacity mb-5">

<h1 class="text-center mt-5" id="titleSection">Liste des vehicules</h1>

    <a class="btn btn-primary" href= '<?=base_url() . "index.php/Admin_controller/"?>'>Retour Accueil</a>

    <a class="btn btn-primary" href= '<?=base_url() . "index.php/Admin_controller/addVehicle/"?>'>Ajouter une voiture</a>

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
        foreach($vehicles as $vehicle) {
        ?>
        
            <tr>
                <td class="p-3"><?= $vehicle['idVehicle']?></td>
                <td><img src="<?= base_url() ?>assets/images/<?= $vehicle['Image'] ?>" alt="<?= $vehicle['Mark'] . ' ' . $vehicle['Model'] ?>" class="img-thumbnail" width="100px"></td>
                <td class="p-3"><?= $vehicle['Mark']?></td>
                <td class="p-3"><?= $vehicle['Model']?></td>
                <td class="p-3"><?= $vehicle['Type']?></td>
                <td class="p-3"><?= $vehicle['Places']?></td>
                <td class="p-3"><?= $vehicle['Dispo']?></td>
                <td class="p-3"><?= $vehicle['Forfait']?></td>
                <td class="p-3"><?= $vehicle['namePark']?></td>
                <td class="p-3"><a href = "<?=base_url() . 'index.php/Admin_controller/editVehicle/' . $vehicle['idVehicle'] ?>">Modifier</a></td>
                <td class="p-3"><a href = "<?=base_url() . 'index.php/Admin_controller/deleteVehicle/' . $vehicle['idVehicle'] ?>">Supprimer</a></td>
            </tr>
        
        <?php
        }
        ?>
    </table> 

</div>