<?php


class AddItemRequest
{
    public $cartId;
    public $productId;
    public $unitPrice;
    public $amount;

    public function __construct($cartId,$productId, $unitPrice, $amount)
    {
        $this->cartId = $cartId;
        $this->productId = $productId;
        $this->unitPrice = $unitPrice;
        $this->amount = $amount;
    }
}