<?php

class Cart_model extends CI_Model
{
    public function getCart()
    {
        $this->db->select('products_id, name, price, count, image');
        $this->db->from('cart');
        $this->db->join('products', 'cart.products_id = products.id');
        
        return $this->db->get()->result_array();
    }

    public function getStockCart($products_id)
    {
        $this->db->select('count');
        $this->db->from('cart');
        $this->db->where('products_id', $products_id);
        
        return $this->db->get()->result_array();
    }

    public function deleteProductCart($products_id)
    {
        $this->db->delete('cart', ['products_id' => $products_id]);
        return $this->db->affected_rows();
    }

    public function deleteAllProductCart()
    {
        $this->db->empty_table('cart');
        return $this->db->affected_rows();
    }

    public function addProductCard($data)
    {
        $this->db->insert('cart', $data);
        return $this->db->affected_rows();
    }

    public function checkProductInCart($products_id)
    {
        $this->db->select('count');
        $this->db->from('cart');
        $this->db->where('products_id', $products_id);
        return $this->db->get()->result_array();
    }

    public function updateCountProductCard($data, $products_id)
    {
        $this->db->update('cart', $data, ['products_id' => $products_id]);
        return $this->db->affected_rows();
    }
}