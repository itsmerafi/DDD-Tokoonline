<?php

namespace Phalcon\Init\Cart\Application;

use Phalcon\Init\Cart\Domain\Model\CartRepository;
use Phalcon\Init\Cart\Domain\Model\Cart;
use Phalcon\Init\Cart\Domain\Model\CartDetail;
use Phalcon\Init\Cart\Domain\Item;
use Phalcon\Init\Cart\Domain\ItemDetail;
use Phalcon\Init\Cart\Domain\Price;

class AddItemService
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function execute(AddItemRequest $request)
    {
        $cart = new Cart($request->cartId);

        $cart->addItem(
            $request->productId,
            $request->unitPrice,
            $request->amount
        )

        $this->cartRepository->add($cart);
    }
}