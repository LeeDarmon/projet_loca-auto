<?php

class Customer_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Customer');
        return $query->result_array();
    }

    public function read($id)
    {
        $query = $this->db->get_where('Customer', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Customer', $data);
    }

    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('Customer', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('Customer');
    }

    public function get_customer_rent($id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('rent', 'customer.id = rent.id_Customer');
        $this->db->join('vehicle', 'rent.id_Vehicle = vehicle.id');
        $this->db->join('mark', 'vehicle.id_Mark = mark.id');
        $this->db->where('customer.id', $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function connect($email, $password)
    {

        $this->db->where('email_cust', $email);
        $this->db->where('pswd_cust', $password);
        $query = $this->db->get('Customer');
        return $query->result();
    }

    public function get_cust_connect($email)
    {
        $this->db->select('pswd_cust');
        $this->db->where('email_cust', $email);
        $query = $this->db->get('Customer');
        return $query->result();
    }

    public function select_rent_actually_or_old($sign,$id)
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
        $query = $this->db->where('customer.id ', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
