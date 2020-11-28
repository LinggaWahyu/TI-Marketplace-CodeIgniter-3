<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Product extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'product');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id == null) {
            $product = $this->product->getProduct();
        } else {
            $product = $this->product->getProduct($id);
        }
        
        
        if($product) {
            $this->response([
                'status' => true,
                'data' => $product
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Product not Found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
