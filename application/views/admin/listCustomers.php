<div class="container">

    <table class="bg-light p-4"> 
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Permis</th>
        </tr>
        <?php
        foreach($customers as $customer) {
        ?>
        
            <tr>
                <td><?= $customer['id']?></td>
                <td><?= $customer['lastname']?></td>
                <td><?= $customer['firstname']?></td>
                <td><?= $customer['phone_number']?></td>
                <td><?= $customer['email_cust']?></td>
                <td><?=date_format(date_create($customer['birth_date']) , "d-m-Y")?></td>
                <td><?= $action = ($customer['license'] == 0) ? 'Non' : 'Oui';?></td>
                <td><a href = '<?=base_url() . "index.php/Admin_controller/deleteCustomer/" . $customer['id'] ?>'>Supprimer</a>
                </td>
            </tr>
        
        <?php
        }
        ?>
    </table> 

</div>