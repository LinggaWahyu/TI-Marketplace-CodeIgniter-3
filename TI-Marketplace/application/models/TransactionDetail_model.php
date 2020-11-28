<?php 

use GuzzleHttp\Client;

class TransactionDetail_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/PrakSister/UAS/TI-Store/api/',
            'auth' => ['admin', 'store1234']
        ]);
    }

    public function addTransactionDetail($id_transaction, $id_product, $count)
    {
        $response = $this->_client->request('POST', 'TransactionDetail', [
            'form_params' => [
                'id_transactions' => $id_transaction,
                'id_products' => $id_product,
                'count' => $count,
                'ti-store-key' => 'store123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getAllTransactionDetail($id_transaction)
    {
        $response = $this->_client->request('GET', 'TransactionDetail', [
            'query' => [
                'ti-store-key' => 'store123',
                'transaction_id' => $id_transaction
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
}