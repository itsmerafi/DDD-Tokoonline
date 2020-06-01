<?php
namespace Phalcon\Init\Cart\Application;

use Phalcon\Init\Cart\Domain\Model\CartRepository;
use Phalcon\Init\Cart\Application\ViewCartResponse;


class ViewCartService
{
    private $cartRepository;

    public function __construct(
        CartRepository  $cartRepositoryImpl
    )
    {
        $this->cartRepository = $cartRepositoryImpl;
    }

    public function execute($Id)
    {
        $cart = $this->cartRepository->getById($Id);
        $response = new ViewCartResponse();

        $response->cartId = $cart->getId();
        $response->totalPrice = $cart->calculate()->getTotalPrice();

        foreach ($cart->calculate()->getItems() as $item){
            $items = array(
                'productId' =>$item->getProductId(),
                'price' => $item->getPrice()->getWithVat(),
                'amount' => $item->getAmount()

            );
            array_push($response->items, $items);
        }

        return $response;




    }
}