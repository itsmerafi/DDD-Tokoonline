<?php

namespace Phalcon\Init\Cart\Infrastructure;

use Phalcon\Init\Cart\Domain\Cart;
use Phalcon\Init\Cart\Domain\CartNotFoundException;
use Phalcon\Init\Cart\Domain\CartRepository;

class MemoryCartRepository implements CartRepository
{

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
