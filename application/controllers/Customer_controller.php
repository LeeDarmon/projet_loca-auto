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
            redirect('customer_controller/connect', 'refresh');
        }
    }



    public function connect()
    {
        $this->form_validation->set_rules('email_cust', 'mail', 'required');
        $this->form_validation->set_rules('pswd_cust', 'mot de passe', 'required');

        $data['title'] = 'profil';

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'connexion';
            $this->load->view('templates/header', $data);
            $this->load->view('customer/connect');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email_cust');
            $password = $this->input->post('pswd_cust');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $this->Customer_model->get_cust_connect($email);
                if ($result == NULL) {
                    $data['error'] = 'Le champ email et/ou mot de passe sont incorrects';
                    $data['title'] = 'connexion';
                    $this->load->view('templates/header', $data);
                    $this->load->view('customer/connect', $data);
                    $this->load->view('templates/footer');
                } else if ($result[0]->pswd_cust != $password) {
                    $data['error'] = 'Le champ email et/ou mot de passe sont incorrects';
                    $data['title'] = 'connexion';
                    $this->load->view('templates/header', $data);
                    $this->load->view('customer/connect', $data);
                    $this->load->view('templates/footer');
                } else {
                    $data['connect'] = $this->Customer_model->connect($email, $password);
                    if ($data['connect'] != null) {

                        $newdata = array(
                            'id' =>   $data['connect'][0]->id,
                            'role' => 'customer',
                            'logged_in' => TRUE
                        );

                        $this->session->set_userdata($newdata);
                        redirect('home_controller/index', 'refresh');
                    }
                }
            }
        }
    }

    public function profil($id)
    {
        $data['profil'] = $this->Customer_model->read($id);
        $data['title'] = 'profil';
        $id = $_SESSION['id'];
        $data['actually'] = $this->Customer_model->select_rent_actually_or_old('actually',$id);
        $data['old'] = $this->Customer_model->select_rent_actually_or_old('old',$id);
        var_dump($data['actually']);
        $this->load->view('templates/header', $data);
        $this->load->view('customer/profil');
        $this->load->view('templates/footer');
    }

    public function modify($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('firstname', 'prenom', 'required');
        $this->form_validation->set_rules('lastname', 'nom', 'required');
        $this->form_validation->set_rules('birth_date', 'date de naissance', 'required');
        $this->form_validation->set_rules('phone_number', 'numeros de telephone', 'required');
        $this->form_validation->set_rules('email_cust', 'mail', 'required');
        $this->form_validation->set_rules('pswd_cust', 'mot de passe', 'required');
        $this->form_validation->set_rules('license', 'license', 'required');

        $modify = array(
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'birth_date' => $this->input->post('birth_date'),
            'phone_number' => $this->input->post('phone_number'),
            'email_cust' => $this->input->post('email_cust'),
            'pswd_cust' => $this->input->post('pswd_cust'),
            'license' => $this->input->post('license')
        );


        $data['profil'] = $this->Customer_model->read($id);
        $data['title'] = 'Modification profil';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('customer/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Customer_model->update($id, $modify);
            redirect('home_controller/index', 'refresh');
        }
    }

    public function disconnect()
    {
        $this->session->sess_destroy();
        delete_cookie('ci_session');
        set_cookie('ci_session', '');
        redirect('home_controller/index', 'refresh');
    }
}
