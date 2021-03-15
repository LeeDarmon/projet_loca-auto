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
                <td class="p-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?=$customer['id']?>">
                Supprimer
                </button>
                </td>
            </tr>

            <div class="modal fade" id="exampleModal-<?=$customer['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Etes vous sûr de vouloir supprimer ce customer?
      </div>
      <div class="modal-footer">
      <a  type="button" class="btn btn-primary" href = '<?=base_url() . "index.php/Admin_controller/deleteCustomer/" . $customer['id'] ?>'>OUI</a>
      <a  type="button" class="btn btn-secondary" href = '<?=base_url() . "index.php/Admin_controller/listCustomers/" ?>'>NON</a>
      </div>
    </div>
  </div>
</div>
        
        <?php
        }
        ?>
    </table> 

</div>


<!-- Modal -->



