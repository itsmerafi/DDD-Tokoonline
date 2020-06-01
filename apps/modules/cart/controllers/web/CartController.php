<?php

namespace Phalcon\Init\Cart\Controllers\Web;
use Phalcon\Http\Request;
use Phalcon\Init\Cart\Application\AddItemService;
use Phalcon\Mvc\Controller;

class CartController extends Controller
{

    public function showCartAction()
    {
        $this->view->pick('cart');
    }

    public function  addAction()
    {
        $cartId = 'user_id';
        $productId = $this->request->getPost('product_id');
        $unitPrice = $this->request->getPort('unit_price');
        $amount =   $this->request->getPost('amount');
        $cartRepository = $this->di->getShared('sql_cart_repository');


//        $service = new GetCartService($CartRepository);
//        $response = $service->execute($cartId);

        $request = new AddItemRequest(
            $cartId,
            $productId,
            $unitPrice,
            $amount
        );
        $service = new AddItemService($cartRepository);
        $service->execute($request);

    }
}