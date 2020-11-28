<?php

class TransactionDetail_model extends CI_Model
{
    public function getAllTransactionDetail($transaction_id)
    {
        $this->db->select('name, count, image, price'); 
        $this->db->from('transaction_details');
        $this->db->join('products', 'transaction_details.id_products = products.id');
        $this->db->where('id_transactions', $transaction_id);

        return $this->db->get()->result_array();
    }

    public function addTransactionDetail($data)
    {
        $this->db->insert('transaction_details', $data);
        return $this->db->affected_rows();
    }
}