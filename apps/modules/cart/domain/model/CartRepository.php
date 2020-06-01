<?php

namespace Phalcon\Init\Cart\Domain\Model;

interface CartRepository
{
    public function addItem(Cart $cart);

    public function getById(string $id):Cart;

    public function remove(string $id): void;
}
