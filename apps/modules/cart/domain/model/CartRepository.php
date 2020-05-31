<?php

namespace Phalcon\Init\Cart\Domain;

interface CartRepository
{

    public function add(Cart $cart): void;

    public function get(string $id): Cart;

    public function remove(string $id): void;
}
