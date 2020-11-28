<?php 

use GuzzleHttp\Client;

class Product_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/PrakSister/UAS/TI-Store/api/',
            'auth' => ['admin', 'store1234']
        ]);
    }

    public function getAllProduct()
    {
        $response = $this->_client->request('GET', 'product', [
            'query' => [
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getProductById($id)
    {
        $response = $this->_client->request('GET', 'product', [
            'query' => [
                'ti-store-key' => 'store123',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }
}