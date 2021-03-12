<div class="container">

    <a href = '<?=base_url() . "index.php/Admin_controller/addVehicle/"?>'>Ajouter une voiture</a>

    <table class="bg-light p-4"> 
        <tr>
            <th>ID</th>
            <th>Marque</th>
            <th>Modele</th>
            <th>Type</th>
            <th>nbr de place</th>
            <th>nbr dispo</th>
            <th>prix / jour</th>
            <th>ou</th>
        </tr>
        <?php
        foreach($vehicles as $vehicle) {
        ?>
        
            <tr>
                <td><?= $vehicle['idVehicle']?></td>
                <td><?= $vehicle['Mark']?></td>
                <td><?= $vehicle['Model']?></td>
                <td><?= $vehicle['Type']?></td>
                <td><?= $vehicle['Places']?></td>
                <td><?= $vehicle['Dispo']?></td>
                <td><?= $vehicle['Forfait']?></td>
                <td><?= $vehicle['namePark']?></td>
                <td><a href = "<?=base_url() . 'index.php/Admin_controller/viewVehicle/' . $vehicle['idVehicle'] ?>">Voir plus</a></td>
                <td><a href = "<?=base_url() . 'index.php/Admin_controller/editVehicle/' . $vehicle['idVehicle'] ?>">Modifier</a></td>
                <td><a href = "<?=base_url() . 'index.php/Admin_controller/deleteVehicle/' . $vehicle['idVehicle'] ?>">Supprimer</a></td>
            </tr>
        
        <?php
        }
        ?>
    </table> 

</div>