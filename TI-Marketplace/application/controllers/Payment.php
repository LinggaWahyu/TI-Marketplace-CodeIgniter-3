<?php

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Payment_model', 'payment');
        $this->load->model('Transaction_model', 'transaction');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['payments'] = $this->payment->getAllPayment();

        $data['total'] = $this->input->get('total');

        $this->load->view('pages/payment', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['payment_details'] = $this->payment->getPaymentById($id);

        $data['total'] = $this->input->get('total');

        $this->form_validation->set_rules('payment_id', 'Payment Id', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('number_account', 'Number Account', 'required');
        $this->form_validation->set_rules('total_price', 'Total Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pages/detail_payment', $data);
            $this->load->view('templates/footer');
        } else {
            $this->payment->addPaymentTransaction();
            $this->transaction->updateTransaction($data['payment_details']['name']);
            $this->cart->removeAllProductInCart();
            $this->session->set_flashdata('flash', 'Pembayaran Anda Berhasil');
            redirect('success');
        }
    }
}