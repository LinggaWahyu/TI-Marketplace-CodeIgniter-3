<?php

class Transaction_model extends CI_Model
{
    public function getTransaction()
    {
        $this->db->select('*'); 
        $this->db->from('transactions');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }

    public function addTransaction($data)
    {
        $this->db->insert('transactions', $data);
        return $this->db->affected_rows();
    }

    public function updateTransaction($data, $id)
    {
        $this->db->update('transactions', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllTransaction()
    {
        $this->db->select('*'); 
        $this->db->from('transactions');

        return $this->db->get()->result_array();
    }
}