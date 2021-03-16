<div class="container main opacity mt-5 mb-5 p-2 p-md-5">

    <h1 class="text-center" id="titleSection">Ajouter un vehicule</h1>
    <div class="row">
        <?php
        echo form_open_multipart('Admin_controller/addVehicle', array('class' => 'col-8 offset-2'));
        ?>
            <div class="row">
                <div class="col-12 col-md-6">
            
                    <?php
                    // Select mark  
                    foreach($marks as $mark) {

                        $optionsMark[$mark['id']] = $mark['name'];
                    }
                    echo form_label('Marque'); 
                    echo form_dropdown('id_Mark', $optionsMark, '' ,array(
                        'class'       => 'form-control',
                    ));
                    echo form_error ( 'id_Mark' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Modèle'); 
                    echo form_input(array('id'=>'vehicle_model','class'=>'form-control','name'=>'vehicle_model' , 'value' => set_value( 'vehicle_model' ))); 
                    echo form_error ( 'vehicle_model' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Type'); 
                    echo form_input(array('id'=>'vehicle_type','class'=>'form-control','name'=>'vehicle_type' , 'value' => set_value( 'vehicle_type' ))); 
                    echo form_error ( 'vehicle_type' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Nombre de place'); 
                    echo form_input(array('id'=>'nb_seat','class'=>'form-control','name'=>'nb_seat', 'value' => set_value( 'nb_seat'))); 
                    echo form_error ( 'nb_seat' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Nombre de véhicules disponible'); 
                    echo form_input(array('id'=>'nb_vehicle_dispo','class'=>'form-control','name'=>'nb_vehicle_dispo', 'value' => set_value( 'nb_vehicle_dispo'))); 
                    echo form_error ( 'nb_vehicle_dispo' ,  '<div class = "text-danger">' ,  '</div>' );

                    foreach($parks as $park) {

                        $optionsPark[$park['id']] = $park['location'];
                    }
                    echo form_label('Lieu'); 
                    echo form_dropdown('id_Parking', $optionsPark, '' ,array(
                        'class'       => 'form-control',
                    ));
                    echo form_error ( 'id_Parking' ,  '<div class = "text-danger">' ,  '</div>' );

                    echo form_label('Prix / jour'); 
                    echo form_input(array('id'=>'price_day','class'=>'form-control','name'=>'price_day', 'value' => set_value( 'price_day'))); 
                    echo form_error ( 'price_day' ,  '<div class = "text-danger">' ,  '</div>' );
                    ?>

                </div>
                <div class="col-12 col-md-6 d-flex flex-column">
                <?php

                    echo form_label('Description'); 
                    echo form_textarea(array('id'=>'vehicle_description','class'=>'form-control','name'=>'vehicle_description' , 'value' => set_value( 'vehicle_description' )));
                    echo form_error ( 'vehicle_description' ,  '<div class = "text-danger">' ,  '</div>' );

                    // Image 
                    echo form_label('Photo'); 
                    ?>
                    <input type="file" name="url_image" />
                    <?php
                    echo $erreur ?? '';

                    echo form_submit(array('id'=>'submit','value'=>'Ajouter','class'=>'btn btn-success mt-5')); 
                    ?>
                </div>
            </div>
            <?php
        echo form_close(); 

        ?>
    </div>

</div>