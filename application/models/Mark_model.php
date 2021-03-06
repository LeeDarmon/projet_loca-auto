<?php

class Mark_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Mark');
        return $query->result_array();
    }

    public function read($id)
    {
        $query = $this->db->get_where('Mark', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Mark', $data);
    }

    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('Mark', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('Mark');
    }
}
