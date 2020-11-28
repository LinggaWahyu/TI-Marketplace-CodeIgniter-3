<?php

class Product_model extends CI_Model
{
    public function getProduct($id = null)
    {
        if($id === null)
        {
            return $this->db->get('products')->result_array();
        } else {
            return $this->db->get_where('products', ['id' => $id])->result_array();
        }
    }

    public function getStock($id)
    {
        $this->db->select('stock');
        return $this->db->get_where('products', ['id' => $id])->result_array();
    }

    public function updateStock($id, $stock)
    {
        $this->db->set('stock', $stock);
        $this->db->where('id', $id);
        $this->db->update('products');
    }
}