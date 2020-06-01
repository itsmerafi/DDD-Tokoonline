<?php

use Phalcon\Init\Cart\Domain\CartRepositoryImpl

class ViewCartService
{
    private $cartRepository;

    public function __construct(
        CartRepositoryImpl  $cartRepositoryImpl
    )
    {
        $this->cartRepository = $cartRepositoryImpl;
    }

    public function execute($Id)
    {
        $cart = $this->cartRepository->getById($Id);

        if($cart){
            return new ViewCartResponse(
                $cart->getId(),
                $cart->getItem()
            );
        }
        return null;




    }
}