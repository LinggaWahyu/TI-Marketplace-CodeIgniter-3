<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class PaymentTransaction extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PaymentTransaction_model', 'transaction');
    }

    public function index_post()
    {
        $data = [
            'payment_id' => $this->post('payment_id'),
            'payment_code' => $this->post('payment_code'),
            'number_account' => $this->post('number_account'),
            'name_account' => $this->post('name_account'),
            'total_payment' => $this->post('total_payment'),
            'status' => $this->post('status')
        ];

        if ($this->transaction->addTransaction($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Payment Successfully !'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Pay Your Transaction'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}