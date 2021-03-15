<div class="container opacity mb-5">

    <h1 class="text-center mt-5" id="titleSection">Liste des clients</h1>

    <a class="btn btn-primary" href = '<?=base_url() . "index.php/Admin_controller/"?>'>Retour Accueil</a>

    <table border="1" class="bg-light p-2"> 
        <tr class="p-2">
            <th class="p-2">ID</th>
            <th class="p-2">Nom</th>
            <th class="p-2">Prénom</th>
            <th class="p-2">Téléphone</th>
            <th class="p-2">Email</th>
            <th class="p-2">Date de naissance</th>
            <th class="p-2">Permis</th>
        </tr>
        <?php
        foreach($customers as $customer) {
        ?>
        
            <tr>
                <td class="p-2"><?= $customer['id']?></td>
                <td class="p-2"><?= $customer['lastname']?></td>
                <td class="p-2"><?= $customer['firstname']?></td>
                <td class="p-2"><?= $customer['phone_number']?></td>
                <td class="p-2"><?= $customer['email_cust']?></td>
                <td class="p-2"><?=date_format(date_create($customer['birth_date']) , "d/m/Y")?></td>
                <td class="p-2"><?= $action = ($customer['license'] == 0) ? 'Non' : 'Oui';?></td>
                <td class="p-2"><a href = '<?=base_url() . "index.php/Admin_controller/deleteCustomer/" . $customer['id'] ?>'>Supprimer</a>
                </td>
            </tr>
        
        <?php
        }
        ?>
    </table> 

</div>