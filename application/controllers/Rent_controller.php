<?php
class Rent_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rent_model');
        $this->load->model('Vehicle_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function addRent($idVehicle){

        $this->form_validation->set_rules('start_date' ,  'date de départ' ,  'required' );

        if( $this->form_validation->run() == FALSE ) // Formulaire invalide
        { 
            $this->load->model('Parking_model');
            $data['parks'] = $this->Parking_model->select_all();
            $data['vehicle'] = $this->Vehicle_model->read($idVehicle);
            
            $data['idVehicle'] = $idVehicle;
            $data["title"] = "Enregistrer une location";
            $this->load->view('templates/header', $data);
            $this->load->view('rent/addRentForm', $data);
            $this->load->view('templates/footer', $data);
        } 
        else // Le formulaire est valide
        { 
            $data = array( 
                'cost' => $this->input->post('cost'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'id_start_park' => $this->input->post('id_start_park'),
                'id_finish_park' => $this->input->post('id_finish_park'),
                'validated' => 0,
                'id_Customer' => $_SESSION['id'],
                'id_Vehicle' => $idVehicle,
            ); 
            $this->Rent_model->insert($data);
            redirect("Customer_controller/profil/".$_SESSION['id']);
        } 
    }

    public function valid_rent($idRent){

        $data = array(

            'validated' => 1,

        );
        $this->Rent_model->update($idRent, $data);
        redirect("Admin_controller/index");
    }
}
