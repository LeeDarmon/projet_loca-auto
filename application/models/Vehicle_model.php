<?php

class Vehicle_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $this->db->select(
            '
        vehicle.id AS idVehicle,
        vehicle_model AS Model,
        vehicle_type AS Type,
        vehicle_description AS Description,
        nb_seat AS Places,
        nb_vehicle_dispo AS Dispo,
        price_day AS Forfait,
        url_image AS Image,
        id_Mark,
        id_Parking,
        Mark.name AS Mark,
        Parking.id AS idPark,
        Parking.location AS namePark'
        );
        $this->db->from('Vehicle');
        $this->db->join('Mark', 'Vehicle.id_Mark = Mark.id');
        $this->db->join('Parking', 'Vehicle.id_Parking = Parking.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function read($id)
    {
        $this->db->select(
            '
        vehicle.id AS idVehicle,
        vehicle_model AS Model,
        vehicle_type AS Type,
        vehicle_description AS Description,
        nb_seat AS Places,
        nb_vehicle_dispo AS Dispo,
        price_day AS Forfait,
        url_image AS Image,
        id_Mark,
        id_Parking,
        Mark.name AS Mark,
        Parking.id AS idPark,
        Parking.location AS namePark'
        );
        $this->db->from('Vehicle');
        $this->db->join('Mark', 'Vehicle.id_Mark = Mark.id');
        $this->db->join('Parking', 'Vehicle.id_Parking = Parking.id');
        $query = $this->db->where('vehicle.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('Vehicle', $data);
    }

    public function update($id, $data)
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
