<?php

use Phalcon\Init\Cart\Domain\CartRepositoryImpl

class GetCartService
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
            return new GetCartResponse(
                $cart->getId(),
                $cart->getItem()
            );
        }
        return null;




    }
}