<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Cart extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Product_model', 'product');
    }

    public function index_get()
    {
        $cart = $this->cart->getCart();        
        
        if($cart) {
            $this->response([
                'status' => true,
                'data' => $cart
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Cart not Found'
            ], RestController::HTTP_OK);
        }
    }

    public function index_delete()
    {
        $products_id = $this->delete('products_id');

        if($products_id === null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an products id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $stockProduct = $this->product->getStock($products_id);
            $stockProductCart = $this->cart->getStockCart($products_id);
            $this->product->updateStock($products_id, $stockProduct[0]['stock'] + $stockProductCart[0]['count']);
            if( $this->cart->deleteProductCart($products_id) > 0 ) {
                $stockProduct = $this->product->getStock($products_id);
                $stockProductCart = $this->cart->getStockCart($products_id);
                $this->product->updateStock($products_id, $stockProduct[0]['stock'] + $stockProductCart[0]['count']);
                $this->response([
                    'status' => true,
                    'products_id' => $products_id,
                    'message' => 'Product in Cart Deleted !'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Product id not Found'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function remove_delete()
    {
        if( $this->cart->deleteAllProductCart() > 0 ) {
            $this->response([
                'status' => true,
                'message' => 'All Product in Cart was Deleted !'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Delete All Product in Cart'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_post()
    {
        $data = [
            'products_id' => $this->post('products_id'),
            'count' => $this->post('count')
        ];

        $product = $this->cart->checkProductInCart($data['products_id']);

        $stock = $this->product->getStock($data['products_id']);
        $updatedStock = $stock[0]['stock'] - $data['count'];

        $dataUpdate = [
            'count' => ($this->post('count') + $product[0]['count'])
        ];


        if($data['count'] < $stock[0]['stock']) {
            if($product) {
                if ($this->cart->updateCountProductCard($dataUpdate, $data['products_id']) > 0) {
                    $this->product->updateStock($data['products_id'], $updatedStock);
                    $this->response([
                        'status' => true,
                        'message' => 'Count Product has been Updated in Cart'
                    ], RestController::HTTP_CREATED);
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'Failed to Update Count Product in Cart'
                    ], RestController::HTTP_BAD_REQUEST);
                }
            } else {
                if ($this->cart->addProductCard($data) > 0) {
                    $this->product->updateStock($data['products_id'], $updatedStock);
                    $this->response([
                        'status' => true,
                        'message' => 'Product has been Added to Cart'
                    ], RestController::HTTP_CREATED);
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'Failed to Added Product to Cart'
                    ], RestController::HTTP_BAD_REQUEST);
                }
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'There is not enough product stock'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $products_id = $this->put('products_id');

        $data = [
            'count' => $this->put('count')
        ];

        if ($this->cart->updateCountProductCard($data, $products_id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Count Product has been Updated in Cart'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Update Count Product in Cart'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
