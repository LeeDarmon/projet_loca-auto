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
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['role'])){

            if($_SESSION['role'] == 'admin'){

                $data['actually_rents'] = $this->Rent_model->select_rent_actually_or_old("actually");
                $data['old_rents'] = $this->Rent_model->select_rent_actually_or_old("old");
                $data["title"] = 'Admin | Location';
                $this->load->view('templates/header', $data);
                $this->load->view('admin/homeAdmin', $data);
                $this->load->view('templates/footer', $data);
    
            }else{
    
                echo 'Vous n\'avez rien a faire ici ! OUST !';
            }

        }else{

            $this->connect();
        }


    }

    public function listCustomers()
    {

        $data['customers'] = $this->Customer_model->select_all();
        $data["title"] = 'Admin | Clients';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/listCustomers', $data);
        $this->load->view('templates/footer', $data);
    }

    public function viewCustomer($idCustomer)
    {

        $data['customer'] = $this->Customer_model->read($idCustomer);
        $data["title"] = 'Admin | Client';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/viewCustomer', $data);
        $this->load->view('templates/footer', $data);
    }

    public function deleteCustomer($idCustomer)
    {
        $this->Customer_model->delete($idCustomer);
        $this->listCustomers();
    }

    public function listVehicles()
    {

        $data['vehicles'] = $this->Vehicle_model->select_all();
        $data["title"] = 'Admin | Voitures';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/listVehicles', $data);
        $this->load->view('templates/footer', $data);
    }

    public function viewVehicle($idVehicle)
    {

        $data['vehicle'] = $this->Vehicle_model->read($idVehicle);
        $data["title"] = 'Admin | Voiture';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/viewVehicle', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addVehicle()
    {

        // Rules
        $this->form_validation->set_rules('vehicle_model',  'Modèle du véhicule',  'required');

        if ($this->form_validation->run() == FALSE) // Formulaire invalide
        {
            $data['parks'] = $this->Parking_model->select_all();
            $data['marks'] = $this->Mark_model->select_all();
            $data["title"] = "Enregistrer une voiture";
            $this->load->view('templates/header', $data);
            $this->load->view('admin/addVehicleForm', $data);
            $this->load->view('templates/footer', $data);
        } else // Le formulaire est valide
        {
            // Enregistrement de l'image
            $config['upload_path']          = './assets/images';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']        = time();

            $this->load->library('upload', $config);
            var_dump($this->upload->data());

            if (!$this->upload->do_upload('url_image')) //Erreur dans l'enregistrement 
            {
                $data['erreur'] = 'erreur dans l\'importation de l\'image';

                $data['parks'] = $this->Parking_model->select_all();
                $data['marks'] = $this->Mark_model->select_all();
                $data["title"] = "Enregistrer une voiture";
                $this->load->view('templates/header', $data);
                $this->load->view('admin/addVehicleForm', $data);
                $this->load->view('templates/footer', $data);
            } else // pas d'erreur
            {
                $data = array(

                    'vehicle_model' => $this->input->post('vehicle_model'),
                    'vehicle_type' => $this->input->post('vehicle_type'),
                    'vehicle_description' => $this->input->post('vehicle_description'),
                    'nb_seat' => $this->input->post('nb_seat'),
                    'nb_vehicle_dispo' => $this->input->post('nb_vehicle_dispo'),
                    'price_day' => $this->input->post('price_day'),
                    'url_image' => $this->upload->data('file_name'),
                    'id_Mark' => $this->input->post('id_Mark'),
                    'id_Parking' => $this->input->post('id_Parking')

                );
                $this->Vehicle_model->insert($data);
                $this->listVehicles();
            }
        }
    }

    public function editVehicle($idVehicle)
    {

        //Rules
        $this->form_validation->set_rules('vehicle_model',  'Modèle du véhicule',  'required');

        $data['vehicle'] = $this->Vehicle_model->read($idVehicle);

        if ($this->form_validation->run() == FALSE) // Formulaire invalide
        {
            $data['parks'] = $this->Parking_model->select_all();
            $data['marks'] = $this->Mark_model->select_all();
            $data["title"] = "Enregistrer une voiture";
            $this->load->view('templates/header', $data);
            $this->load->view('admin/editVehicleForm', $data);
            $this->load->view('templates/footer', $data);
        } else // Le formulaire est valide
        {
            if ($_FILES['url_image']['tmp_name'] != "") { // Il y a une image dans le form 

                // Enregistrement de l'image
                $config['upload_path']          = './assets/images';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']        = $data['vehicle'][0]['Image'];
                $config['overwrite']        = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('url_image')) // Erreur
                {
                    $data['erreur'] = 'erreur dans l\'importation de l\'image';

                    $data['vehicle'] = $this->Vehicle_model->read($idVehicle);
                    $data['parks'] = $this->Parking_model->select_all();
                    $data['marks'] = $this->Mark_model->select_all();
                    $data["title"] = "Enregistrer une voiture";
                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/editVehicleForm', $data);
                    $this->load->view('templates/footer', $data);
                } else // Pas d'erreur
                {
                    $data = array(

                        'vehicle_model' => $this->input->post('vehicle_model'),
                        'vehicle_type' => $this->input->post('vehicle_type'),
                        'vehicle_description' => $this->input->post('vehicle_description'),
                        'nb_seat' => $this->input->post('nb_seat'),
                        'nb_vehicle_dispo' => $this->input->post('nb_vehicle_dispo'),
                        'price_day' => $this->input->post('price_day'),
                        'url_image' => $this->upload->data('file_name'),
                        'id_Mark' => $this->input->post('id_Mark'),
                        'id_Parking' => $this->input->post('id_Parking')

                    );
                    $this->Vehicle_model->update($idVehicle, $data);
                    $this->viewVehicle($idVehicle);
                }
            } else { //Aucune image envoyé

                $data = array(

                    'vehicle_model' => $this->input->post('vehicle_model'),
                    'vehicle_type' => $this->input->post('vehicle_type'),
                    'vehicle_description' => $this->input->post('vehicle_description'),
                    'nb_seat' => $this->input->post('nb_seat'),
                    'nb_vehicle_dispo' => $this->input->post('nb_vehicle_dispo'),
                    'price_day' => $this->input->post('price_day'),
                    'id_Mark' => $this->input->post('id_Mark'),
                    'id_Parking' => $this->input->post('id_Parking')

                );
                $this->Vehicle_model->update($idVehicle, $data);
                var_dump($this->Vehicle_model->update($idVehicle, $data));
                $this->viewVehicle($idVehicle);
            }
        }
    }

    public function deleteVehicle($idVehicle)
    {
        $this->Vehicle_model->delete($idVehicle);
        $this->listVehicles();
    }



    public function insert_admin()
    {

        $password = password_hash('password', PASSWORD_DEFAULT);
        $data = array(
            'email_a' => 'admin@admin.fr',
            'password_a' => $password,
        );
        $this->Admin_model->insert($data);
    }

    public function connect()
    {
        $this->form_validation->set_rules('email_a', 'mail', 'required');
        $this->form_validation->set_rules('password_a', 'mot de passe', 'required');

        $data['title'] = 'profil';

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'connexion';
            $this->load->view('templates/header', $data);
            $this->load->view('admin/connect');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email_a');
            $password = $this->input->post('password_a');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $this->Admin_model->get_admin_connect($email);
                $mdp = $result[0]->password_a;
                if ($result == NULL) {
                    $data['error'] = 'Le champ email et/ou mot de passe sont incorrects';
                    $data['title'] = 'connexion';
                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/connect', $data);
                    $this->load->view('templates/footer');
                    // } else if ($result[0]->password_a != $password) {
                } else if (!password_verify($password, $mdp)) {
                    $data['error'] = 'Le champ email et/ou mot de passe sont incorrects';
                    $data['title'] = 'connexion';
                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/connect', $data);
                    $this->load->view('templates/footer');
                } else {
                    $data['connect'] = $this->Admin_model->connect($email, $mdp);
                    if ($data['connect'] != null) {
                        $newdata = array(
                            'id' =>   $data['connect'][0]->id,
                            'role' => 'admin',
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);
                        $this->index();
                    }
                }
            }
        }
    }
}
