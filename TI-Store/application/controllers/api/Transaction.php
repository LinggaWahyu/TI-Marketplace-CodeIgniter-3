<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Transaction extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transaction');
    }

    public function index_get()
    {
        $transaction = $this->transaction->getTransaction();        
        
        if($transaction) {
            $this->response([
                'status' => true,
                'data' => $transaction
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Transaction not Found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'date' => $this->post('date'),
            'name_user' => $this->post('name_user'),
            'address' => $this->post('address'),
            'payment_method' => $this->post('payment_method'),
            'total_price' => $this->post('total_price')
        ];

        if ($this->transaction->addTransaction($data) > 0) {
        $this->response([
                'status' => true,
                'message' => 'Transaction was Successfully'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Transaction Failed'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'payment_method' => $this->put('payment_method')
        ];

        if ($this->transaction->updateTransaction($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Transaction has been Updated'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Update Transaction'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function all_get()
    {
        $transaction = $this->transaction->getAllTransaction();        
        
        if($transaction) {
            $this->response([
                'status' => true,
                'data' => $transaction
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Transaction not Found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
