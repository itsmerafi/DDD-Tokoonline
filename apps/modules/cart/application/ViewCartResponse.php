<?php
namespace Phalcon\Init\Cart\Application;


class ViewCartResponse
{
    public $cartId;
    public $totalPrice;
    public $items;

    public function __construct()
    {
        $this->items = array();
    }

    public function addItemResponse($productId, $unitPrice, $amount)
    {


        //array_push($this->items, $item);
    }
}