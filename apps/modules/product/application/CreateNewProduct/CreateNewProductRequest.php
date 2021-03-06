<?php

namespace Phalcon\Init\Product\Application\CreateNewProduct;

class CreateNewProductRequest
{
    public $ProductName;
    public $ProductDescription;
    public $quantity;
    public $price;

    public function __construct($ProductName, $ProductDescription, $quantity, $price)
    {
        $this->ProductName = $ProductName;
        $this->ProductDescription = $ProductDescription;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->ProductName;
    }

    /**
     * @param mixed $ProductName
     */
    public function setProductName($ProductName)
    {
        $this->ProductName = $ProductName;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->ProductDescription;
    }

    /**
     * @param mixed $ProductDescription
     */
    public function setProductDescription($ProductDescription)
    {
        $this->ProductDescription = $ProductDescription;
    }

    /**
     * @return mixed
     */
    public function getProductQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setProductQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setProductPrice($price)
    {
        $this->price = $price;
    }



}