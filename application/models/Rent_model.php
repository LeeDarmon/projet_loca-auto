<?php

class Rent_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Rent');
        return $query->result_array();
    }

    public function select_rent_actually_or_old($sign)
    {

        if ($sign == 'actually') {
            $sign = '>';
        } elseif ($sign == 'old') {
            $sign = '<';
        } else {
        }
        $yesterday_date = date('Y/m/d', strtotime(' - 1 days'));
        $query = $this->db->select('
        rent.id AS rentId,
        rent.cost ,
        rent.start_date,
        rent.end_date ,
        rent.validated,
        customer.id AS customerId,
        customer.firstname ,
        customer.lastname ,
        customer.phone_number ,
        customer.email_cust,
        vehicle.id AS vehicleId,
        vehicle.vehicle_model,
        vehicle.url_image,
        start_park.location AS locationStart,
        end_park.location AS locationEnd,
        mark.name AS markName
        ');
        $query = $this->db->from('rent');
        $query = $this->db->join('customer', 'customer.id = rent.id_Customer');
        $query = $this->db->join('vehicle', 'vehicle.id = rent.id_Vehicle');
        $query = $this->db->join('parking AS start_park', 'start_park.id = rent.id_start_park');
        $query = $this->db->join('parking AS end_park', 'end_park.id = rent.id_finish_park');
        $query = $this->db->join('mark', 'mark.id = vehicle.id_Mark');
        $query = $this->db->where('rent.start_date ' . $sign, $yesterday_date);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function read($id)
    {
        $query = $this->db->get_where('Rent', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Rent', $data);
    }

    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('Rent', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('Rent');
    }
}
