<div class="container opacity mb-5">

    <h1 class="text-center mt-5" id="titleSection">Modifier un vehicule</h1>
    <?php
    echo form_open_multipart('Admin_controller/editVehicle/' . $vehicle[0]['idVehicle'] );

    // Select mark  
    foreach($marks as $mark) {

        $optionsMark[$mark['id']] = $mark['name'];
    }
    echo form_label('Marque'); 
    echo form_dropdown('id_Mark', $optionsMark , $vehicle[0]['id_Mark'] );
    echo form_error ( 'id_Mark' ,  '<div class = "text-danger">' ,  '</div>' );

    echo form_label('Modèle'); 
    echo form_input(array('id'=>'vehicle_model','name'=>'vehicle_model' , 'value' => set_value( 'vehicle_model', $vehicle[0]['Model'] ))); 
    echo form_error ( 'vehicle_model' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 


    echo form_label('Type'); 
    echo form_input(array('id'=>'vehicle_type','name'=>'vehicle_type' , 'value' => set_value( 'vehicle_type',$vehicle[0]['Type'] ))); 
    echo form_error ( 'vehicle_type' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 

    echo form_label('Description'); 
    echo form_textarea(array('id'=>'vehicle_description','name'=>'vehicle_description' , 'value' => set_value( 'vehicle_description',$vehicle[0]['Description'] )));
    echo form_error ( 'vehicle_description' ,  '<div class = "text-danger">' ,  '</div>' );

    echo form_label('Nombre de place'); 
    echo form_input(array('id'=>'nb_seat','name'=>'nb_seat', 'value' => set_value( 'nb_seat', $vehicle[0]['Places']))); 
    echo form_error ( 'nb_seat' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 

    echo form_label('Nombre de véhicules disponible'); 
    echo form_input(array('id'=>'nb_vehicle_dispo','name'=>'nb_vehicle_dispo', 'value' => set_value( 'nb_vehicle_dispo',$vehicle[0]['Dispo']))); 
    echo form_error ( 'nb_vehicle_dispo' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 

    echo form_label('Prix / jour'); 
    echo form_input(array('id'=>'price_day','name'=>'price_day', 'value' => set_value( 'price_day' , $vehicle[0]['Forfait']))); 
    echo form_error ( 'price_day' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 

    // Image 
    echo form_label('Photo'); 
    // echo form_upload(array('id'=>'url_image','name'=>'url_image'));
    ?>
    <input type="file" name="url_image" />
    <?php
    echo $erreur ?? '';

    foreach($parks as $park) {

        $optionsPark[$park['id']] = $park['location'];
    }
    echo form_label('Lieu'); 
    echo form_dropdown('id_Parking', $optionsPark , $vehicle[0]['idPark']);
    echo form_error ( 'id_Parking' ,  '<div class = "text-danger">' ,  '</div>' );

    echo form_submit(array('id'=>'submit','value'=>'Modifier')); 
    echo form_close(); 

?>
</div>