<?php

namespace Phalcon\Init\Cart\Domain;

interface CartRepository
{

    public function addItem(Cart $cart);

    public function createCart(string cart_id) : Cart;

    public function getById(string $id): Cart;

    public function remove(string $id): void;
}
