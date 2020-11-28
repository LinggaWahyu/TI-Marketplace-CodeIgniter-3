<?php

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transaction');
        $this->load->model('TransactionDetail_model', 'transaction_detail');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['transactions'] = $this->transaction->getAllTransaction();

        $this->load->view('templates/header');
        $this->load->view('pages/transaction', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['transaction_detail'] = $this->transaction_detail->getAllTransactionDetail($id);

        $this->load->view('templates/header');
        $this->load->view('pages/transaction_detail', $data);
        $this->load->view('templates/footer');
    }
}