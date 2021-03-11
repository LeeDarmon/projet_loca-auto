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
        $this->load->library('session');
    }

    public function register()
    {

        $this->form_validation->set_rules('firstname', 'prenom', 'required');
        $this->form_validation->set_rules('lastname', 'nom', 'required');
        $this->form_validation->set_rules('birth_date', 'date_naissance', 'required');
        $this->form_validation->set_rules('phone_number', 'numeros de téléphone', 'required');
        $this->form_validation->set_rules('email_cust', 'mail', 'required|is_unique[customer.email_cust]');
        $this->form_validation->set_rules('pswd_cust', 'mot de passe', 'required');
        $this->form_validation->set_rules('license', 'license', 'required');

        $data = array(
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'birth_date' => $this->input->post('birth_date'),
            'phone_number' => $this->input->post('phone_number'),
            'email_cust' => $this->input->post('email_cust'),
            'pswd_cust' => $this->input->post('pswd_cust'),
            'license' => $this->input->post('license')
        );

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'inscription';
            $this->load->view('templates/header', $data);
            $this->load->view('customer/register');
            $this->load->view('templates/footer');
        } else {
            $this->Customer_model->insert($data);
            $this->load->view('customer/success');
        }
    }

    public function connect()
    {
        $this->form_validation->set_rules('email_cust', 'mail', 'required');
        $this->form_validation->set_rules('pswd_cust', 'mot de passe', 'required');

        $email = $this->input->post('email_cust');
        $password = $this->input->post('pswd_cust');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'connexion';
            $this->load->view('templates/header', $data);
            $this->load->view('customer/connect');
            $this->load->view('templates/footer');
        } else {
            $data['connect'] = $this->Customer_model->connect($email, $password);

            if ($data['connect'] != null) {

                $newdata = array(
                    'id' =>   $data['connect'][0]->id,
                    'firstname'  => $data['connect'][0]->firstname,
                    'lastname'     => $data['connect'][0]->lastname,
                    'phone_number'     => $data['connect'][0]->phone_number,
                    'email_cust'     => $data['connect'][0]->email_cust,
                    'pswd_cust'     => $data['connect'][0]->pswd_cust,
                    'birth_date'     => $data['connect'][0]->birth_date,
                    'license'     => $data['connect'][0]->license,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);
                $this->load->view('customer/success', $data);
            }
        }
    }

    public function profil()
    {
        $data['title'] = 'profil';
        $this->load->view('templates/header', $data);
        $this->load->view('customer/profil');
        $this->load->view('templates/footer');
    }
}
