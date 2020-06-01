<?php


namespace Phalcon\Init\Product\Application\ViewAllProduct;


class ViewAllProductResponse
{
    public $products;

    public function __construct()
    {
        $this->products= array();
    }

    public function  addProductResponse($id, $name, $description, $quantity, $price)
    {
        $product = array(
            'id' => $id,
            'name' => $name,
            'decription' => $description,
            'quantity'=> $quantity,
            'price' => $price
        );

        array_push($this->products, $product);
    }
}