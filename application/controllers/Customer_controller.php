<?php
class Customer_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function register(){

        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth_date', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required');
        $this->form_validation->set_rules('email_c', 'EMail_c', 'required');

    }

}