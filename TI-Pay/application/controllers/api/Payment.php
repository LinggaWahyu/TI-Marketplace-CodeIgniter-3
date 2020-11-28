<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Payment extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model', 'payment');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id == null) {
            $payment = $this->payment->getPayment();
        } else {
            $payment = $this->payment->getPayment($id);
        }
        
        if($payment) {
            $this->response([
                'status' => true,
                'data' => $payment
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Payment not Found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}