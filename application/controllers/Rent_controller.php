<?php
class Rent_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rent_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function addRent(){

        //Les regles sont dans appli/config/form_validation.php
        if( $this->form_validation->run() == FALSE ) // Formulaire invalide
        { 
            $data["title"] = "Enregistrer une location";
            $this->load->view('templates/header', $data);
            $this->load->view('rent/addRentForm', $data);
            $this->load->view('templates/footer', $data);
        } 
        else // Le formulaire est valide
        { 
            $data = array( 

                'lastname' => $this->input->post('lastname'),

            ); 
            $this->Rent_model->insert($data); 

            $this->Admin_controller->index;
        } 
    }

}