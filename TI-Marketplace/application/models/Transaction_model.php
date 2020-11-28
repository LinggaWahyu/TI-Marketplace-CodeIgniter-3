<?php 

use GuzzleHttp\Client;

class Transaction_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/PrakSister/UAS/TI-Store/api/',
            'auth' => ['admin', 'store1234']
        ]);
    }

    public function getAllTransaction()
    {
        $response = $this->_client->request('GET', 'transaction/all', [
            'query' => [
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function addTransaction()
    {
        $data = [
            "date" => date("Y-m-d"),
            "name_user" => $this->input->post('name', true),
            "address" => $this->input->post('address', true),
            "payment_method" => '',
            "total_price" => $this->input->post('total', true),
            'ti-store-key' => 'store123'
        ];

        $response = $this->_client->request('POST', 'transaction', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $data;
    }

    public function updateTransaction($payment_method)
    {
        $response = $this->_client->request('GET', 'transaction', [
            'query' => [
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $id_transaction = $result['data'][0]['id'];

        $data = [
            'id' => $id_transaction,
            'payment_method' => $payment_method,
            'ti-store-key' => 'store123'
        ];

        $response = $this->_client->request('PUT', 'transaction', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getIdTransaction()
    {
        $response = $this->_client->request('GET', 'transaction', [
            'query' => [
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}