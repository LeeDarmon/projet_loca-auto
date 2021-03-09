<?php

Class Vehicle_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Vehicle');
        return $query->result_array();
    }

    public function read($id)
    {
        $query = $this->db->get_where('Vehicle', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Vehicle', $data);
    }

    public function update($id,$data)
    {
        $this->db->set($data); 
        $this->db->where('id', $id);
        return $this->db->update('Vehicle', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('Vehicle');
    }

}