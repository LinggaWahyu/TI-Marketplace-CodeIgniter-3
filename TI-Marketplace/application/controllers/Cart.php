<?php

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Transaction_model', 'transaction');
        $this->load->model('TransactionDetail_model', 'transaction_detail');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['products'] = $this->cart->getAllProductCart();

        if (!$data['products']) {
            $data['products'] = false;
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required',
            array('required' => 'Cart Tidak Boleh Kosong')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('pages/cart', $data);
            $this->load->view('templates/footer');
        } else {
            $data_payment = $this->transaction->addTransaction();

            $result = $this->transaction->getIdTransaction();

            $id_transaction = $result['data'][0]['id'];

            foreach ($data['products'] as $product) : 
                $this->transaction_detail-> addTransactionDetail($id_transaction, $product['products_id'], $product['count']);
            endforeach;

            $this->session->set_flashdata('flash', 'Data Transaksi Berhasil Ditambahkan');
            redirect('payment?total=' . $data_payment['total_price']);
        }
    }

    public function tambah($id_product)
    {
        $this->cart->addProductToCart($id_product, 1);
        $this->session->set_flashdata('flash', 'Produk Berhasil Ditambahkan ke Keranjang');
        redirect('product/detail/' . $id_product);
    }

    public function hapus($id_product)
    {
        $this->cart->removeProductInCart($id_product);
        $this->session->set_flashdata('flash', 'Produk Berhasil Dihapus dari Keranjang');
        redirect('cart');
    }
}