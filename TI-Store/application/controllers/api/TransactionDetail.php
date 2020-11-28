<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class TransactionDetail extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransactionDetail_model', 'transaction_detail');
    }

    public function index_get()
    {
        $transaction_id = $this->get('transaction_id');

        $transaction = $this->transaction_detail->getAllTransactionDetail($transaction_id);        
        
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
            'id_transactions' => $this->post('id_transactions'),
            'id_products' => $this->post('id_products'),
            'count' => $this->post('count')
        ];

        if ($this->transaction_detail->addTransactionDetail($data) > 0) {
        $this->response([
                'status' => true,
                'message' => 'Transaction Detail was Added'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Transaction Detail Failed Added'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
