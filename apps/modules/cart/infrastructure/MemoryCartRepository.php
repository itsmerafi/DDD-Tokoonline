<?php

namespace Phalcon\Init\Cart\Infrastructure;

use Phalcon\Init\Cart\Domain\Model\CartRepository;
use Phalcon\Init\Cart\Domain\Model\Cart;
use Phalcon\Init\Cart\Domain\Model\CartDetail;
use Phalcon\Init\Cart\Domain\Item;
use Phalcon\Init\Cart\Domain\ItemDetail;
use Phalcon\Init\Cart\Domain\Price;

class MemoryCartRepository implements CartRepository
{
    protected $di;
    private $carts = [];


    public function add(Cart $cart): void
    {
        $this->carts[$cart->getId()] = $cart;
    }

    public function get(string $id): Cart
    {
        $this->checkExistence($id);
        return $this->carts[$id];
    }

    private function checkExistence(string $id): void
    {
        if (!isset($this->carts[$id])) {
            throw new CartNotFoundException();
        }
    }

    public function remove(string $id): void
    {
        $this->checkExistence($id);
        unset($this->carts[$id]);
    }
}
