<?php

class PaymentTransaction_model extends CI_Model
{
    public function addTransaction($data)
    {
        $this->db->insert('payment_transaction', $data);
        return $this->db->affected_rows();
    } 
}