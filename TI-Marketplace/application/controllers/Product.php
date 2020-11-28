<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'product');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['products'] = $this->product->getAllProduct();

        $this->load->view('templates/header');
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['product_details'] = $this->product->getProductById($id);

        $this->load->view('templates/header');
        $this->load->view('pages/detail', $data);
        $this->load->view('templates/footer');
    }
}