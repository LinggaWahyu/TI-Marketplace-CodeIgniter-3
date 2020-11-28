<?php 

use GuzzleHttp\Client;

class Cart_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/PrakSister/UAS/TI-Store/api/',
            'auth' => ['admin', 'store1234']
        ]);
    }

    public function getAllProductCart()
    {
        $response = $this->_client->request('GET', 'cart', [
            'query' => [
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['status']) {
            return $result['data'];
        } else {
            return false;
        }   
    }

    public function addProductToCart($id_product, $count)
    {
        $response = $this->_client->request('POST', 'cart', [
            'form_params' => [
                'products_id' => $id_product,
                'count' => $count,
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function removeProductInCart($id_product)
    {
        $response = $this->_client->request('DELETE', 'cart', [
            'form_params' => [
                'products_id' => $id_product,
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function removeAllProductInCart()
    {
        $response = $this->_client->request('DELETE', 'cart/remove', [
            'form_params' => [
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}