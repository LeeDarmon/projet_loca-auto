    <div class="container main opacity mt-5 mb-5 p-2 p-md-5">
    <h1 class="text-center" id="titleSection">Louer une voiture</h1>

        <div class="row">
            <?php 
            echo form_open('Rent_controller/addRent/' . $idVehicle, array('class' => 'col-8 offset-2'));
            ?>
                <div class="row">
                    <div class="col-12 col-md-6">

                        <div class="form-group">
                        <?php
                        echo form_label('Date de début'); 
                        echo form_input(array('id'=>'start_date','class'=>'form-control', 'name'=>'start_date', 'value' => set_value( 'start_date',date('Y-m-d')) , "type" => "date")); 
                        echo form_error ( 'start_date' ,  '<div class = "text-danger">' ,  '</div>' );

                        echo form_label('Date de fin'); 
                        echo form_input(array('id'=>'end_date','class'=>'form-control','name'=>'end_date', 'value' => set_value( 'end_date') , "type" => "date")); 
                        echo form_error ( 'end_date' ,  '<div class = "text-danger">' ,  '</div>' );

                        foreach($parks as $park) {

                            $options[$park['id']] = $park['location'];
                        }

                        echo form_label('Lieu de départ'); 
                        echo form_dropdown('id_start_park', $options , '' ,array(
                            'class'       => 'form-control',
                        ));
                        echo form_error ( 'id_start_park' ,  '<div class = "text-danger">' ,  '</div>' );

                        echo form_label('Lieu d\'arrivée'); 
                        echo form_dropdown('id_finish_park', $options, '' ,array(
                            'class'       => 'form-control',
                        ));
                        echo form_error ( 'id_finish_park' ,  '<div class = "text-danger">' ,  '</div>' );

                        ?>
                        </div>

                    </div>
                    <div class="col-12 col-md-6 my-auto bg-light p-4">

                        <div class="d-flex flex-column">
                            <p class="align-self-center"> Prix à la journée <span id="forfait"><?= $vehicle[0]['Forfait'];?></span> € </p>
                            <p class="align-self-center">Nb jours =<span id="final_days"></span></p>
                            <p class="align-self-center">Prix final =<span id="final_price"></span></p>
                            <input type="hidden" name="cost" id="cost" value="">
                            <?php
                            echo form_submit(array('id'=>'submit','value'=>'Louer','class'=>'btn btn-success'));
                            ?>                            
                        </div>
                    </div>
                </div>
            <?php
            echo form_close(); 
            ?> 

        </div>
    </div>




