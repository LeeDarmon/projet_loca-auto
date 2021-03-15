<?php

class Admin_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Admin');
        return $query->result_array();
    }

    public function read($id)
    {
        $query = $this->db->get_where('Admin', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Admin', $data);
    }

    public function connect($email, $password)
    {

        $this->db->where('email_a', $email);
        $this->db->where('password_a', $password);
        $query = $this->db->get('Admin');
        return $query->result();
    }

    public function get_admin_connect($email)
    {
        $this->db->select('password_a');
        $this->db->where('email_a', $email);
        $query = $this->db->get('Admin');
        return $query->result();
    }


}
