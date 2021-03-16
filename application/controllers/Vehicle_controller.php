<?php

class Vehicle_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vehicle_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function listVehicles()
    {
        $this->load->model('Vehicle_model');
        $data['title'] = 'Liste des véhicules';
        $data['vehicles'] = $this->Vehicle_model->select_all();
        $this->load->view('templates/header', $data);
        $this->load->view('vehicle/catalogue-vehicles', $data);
        $this->load->view('templates/footer');
    }

    public function viewVehicle($id)
    {
        $this->load->model('Vehicle_model');
        $data['title'] = 'Détails du véhicule';
        $data['vehicle'] = $this->Vehicle_model->read($id);
        $this->load->view('templates/header', $data);
        $this->load->view('vehicle/profile-vehicle', $data);
        $this->load->view('templates/footer');
    }

    public function search()
    {
            $data['title'] = 'Liste des véhicules';
            $this->form_validation->set_rules('model', 'Model', 'required');
            $model = $this->input->post('model'); 
            $data['vehicles'] = $this->Vehicle_model->search_vehicle($model);
            $this->load->view('templates/header', $data);
            $this->load->view('vehicle/catalogue-vehicles', $data);
            $this->load->view('templates/footer');
        
    }
}
