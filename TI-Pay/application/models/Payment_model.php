<?php

class Payment_model extends CI_Model
{
    public function getPayment($id = null)
    {
        if($id === null)
        {
            return $this->db->get('payment')->result_array();
        } else {
            return $this->db->get_where('payment', ['id' => $id])->result_array();
        }
    }
}