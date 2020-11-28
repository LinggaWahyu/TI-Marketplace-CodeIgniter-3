<?php 

use GuzzleHttp\Client;

class Payment_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/PrakSister/UAS/TI-Pay/api/',
            'auth' => ['admin', 'pay1234']
        ]);
    }

    public function getAllPayment()
    {
        $response = $this->_client->request('GET', 'payment', [
            'query' => [
                'ti-pay-key' => 'pay123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getPaymentById($id)
    {
        $response = $this->_client->request('GET', 'payment', [
            'query' => [
                'ti-pay-key' => 'pay123',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function addPaymentTransaction()
    {
        $data = [
            "payment_id" => $this->input->post('payment_id', true),
            "payment_code" => $this->input->post('code', true),
            "name_account" => $this->input->post('name', true),
            "number_account" => $this->input->post('number_account', true),
            "total_payment" => $this->input->post('total_price', true),
            "status" => 'SUCCESS',
            'ti-pay-key' => 'pay123'
        ];

        $response = $this->_client->request('POST', 'PaymentTransaction', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}