<?php

Class Parking_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Parking');
        return $query->result_array();
    }

    public function read($id)
    {
        $query = $this->db->get_where('Parking', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Parking', $data);
    }

    public function update($id,$data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Parking', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('Parking');
    }

}