<?php 

    echo form_open('Rent_controller/addRent/' . $idVehicle);

    echo form_label('Date de début'); 
    echo form_input(array('id'=>'start_date','name'=>'start_date', 'value' => set_value( 'start_date') , "type" => "date")); 
    echo form_error ( 'start_date' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 

    echo form_label('Date de fin'); 
    echo form_input(array('id'=>'end_date','name'=>'end_date', 'value' => set_value( 'end_date') , "type" => "date")); 
    echo form_error ( 'end_date' ,  '<div class = "text-danger">' ,  '</div>' );
    echo "<br/>"; 

    foreach($parks as $park) {

        $options[$park['id']] = $park['location'];
    }

    echo form_label('Lieu de départ'); 
    echo form_dropdown('id_start_park', $options);
    echo form_error ( 'id_start_park' ,  '<div class = "text-danger">' ,  '</div>' );

    echo form_label('Lieu d\'arrivé'); 
    echo form_dropdown('id_finish_park', $options);
    echo form_error ( 'id_finish_park' ,  '<div class = "text-danger">' ,  '</div>' );

    echo form_label('Prix total');


    echo form_submit(array('id'=>'submit','value'=>'Louer')); 
    echo form_close(); 

?> 


<div class="container">
    <div class="col-12 bg-dark mt-5 mb-5">
        <p class="display-3 text-white">Prix final =<span id="final_price"></span></p>
        <p class="display-3 text-white">Nb jours =<span id="final_days"></span></p>
        <button id="click">Test</button>
        
    </div>
</div>