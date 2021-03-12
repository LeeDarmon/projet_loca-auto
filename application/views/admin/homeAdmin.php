<div class="container">

    <button><a href="<?= base_url() . 'index.php/Admin_controller/listVehicles' ?>">Liste des voitures</a></button>
    <button><a href="<?= base_url() . 'index.php/Admin_controller/listCustomers' ?>">Liste des clients</a></button>
    <table>
        <tr>
            <th>ID</th>
            <th>Voiture</th>
            <th>Client</th>
            <th>Details</th>
        </tr>
        <?php
        foreach ($actually_rents as $actually_rent) {
        ?>

            <tr>
                <td><?= $actually_rent->rentId ?></td>
                <td>
                    <p><?= $actually_rent->url_image ?>
                    <p>
                    <p><?= $actually_rent->markName ?> <?= $actually_rent->vehicle_model ?></p>
                    <a href="<?= base_url() . 'index.php/Admin_controller/viewVehicle/' . $actually_rent->vehicleId ?>">Voir plus</a>
                </td>
                <td>
                    <p><?= $actually_rent->firstname ?></p>
                    <p><?= $actually_rent->lastname ?></p>
                    <p><?= $actually_rent->phone_number ?></p>
                    <p><?= $actually_rent->email_cust ?></p>
                    <a href="<?= base_url() . 'index.php/Admin_controller/viewCustomer/' . $actually_rent->customerId ?>">Voir plus</a>
                </td>
                <td>
                    <p><?= $actually_rent->start_date ?><?= $actually_rent->locationStart ?>
                    <p>
                    <p>au</p>
                    <p><?= $actually_rent->end_date ?><?= $actually_rent->locationEnd ?>
                    <p>
                    <p> => <?= $actually_rent->cost ?></p>
                </td>
                <td><a href='<?= base_url() . "index.php/Rent_controller/editRent/" . $actually_rent->rentId ?>'>Modifier</a>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>

</div>