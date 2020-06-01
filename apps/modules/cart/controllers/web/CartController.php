<?php

namespace Phalcon\Init\Cart\Controllers\Web;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
use Phalcon\Init\Cart\Application\AddItemService;
use Phalcon\Init\Cart\Application\ViewCartService;



class CartController extends Controller
{

    public function showCartAction()
    {
        $cartRepository = $this->di->getShared('sql_cart_repository');
        $service = new ViewCartService($cartRepository);
        $response = $service->execute('user_id');

        $this->view->setVar('cart', $response);
        $this->view->pick('layout');
    }

    public function  addAction()
    {
        $cartId = 'user_id';
        $productId = $this->request->getPost('product_id');
        $unitPrice = $this->request->getPort('unit_price');
        $amount =   $this->request->getPost('amount');
        $cartRepository = $this->di->getShared('sql_cart_repository');


//        $service = new ViewCartService($CartRepository);
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