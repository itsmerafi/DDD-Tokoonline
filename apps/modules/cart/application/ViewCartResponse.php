<?php


class ViewCartResponse
{
    private $cart_id;
    private $item;

    public function __construct($cart_id, $item)
    {
        $this->cart_id = $cart_id;
        $this->item = $item;
    }
}