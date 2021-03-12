<?php
class Admin_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Vehicle_model');
        $this->load->model('Mark_model');
        $this->load->model('Parking_model');
        $this->load->model('Rent_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['actually_rents'] = $this->Rent_model->select_rent_actually_or_old("actually");
        $data['old_rents'] = $this->Rent_model->select_rent_actually_or_old("old");
        $data["title"] = 'Admin | Location';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/homeAdmin', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listCustomers()
    {

        $data['customers'] = $this->Customer_model->select_all();
        $data["title"] = 'Admin | Clients';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/listCustomers', $data);
        $this->load->view('templates/footer', $data);
    }
    public function deleteCustomer($id){


    }

    public function listVehicles(){

        $data['vehicles'] = $this->Vehicle_model->select_all();
        $data["title"] = 'Admin | Voitures';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/listVehicles', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addVehicle(){


    }

    public function editVehicle(){

        
    }
}
