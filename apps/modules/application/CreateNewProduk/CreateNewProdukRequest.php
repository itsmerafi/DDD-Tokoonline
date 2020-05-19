<?php

namespace Phalcon\Init\Produk\Application\CreateNewProduk;

class CreateNewProdukRequest
{
    public $ProdukName;
    public $ProdukDescription;
    public $quantity;
    public $price;

    public function __construct($ProdukName, $ProdukDescription, $quantity, $price)
    {
        $this->ProdukName = $ProdukName;
        $this->ProdukDescription = $ProdukDescription;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getProdukName()
    {
        return $this->ProdukName;
    }

    /**
     * @param mixed $ProdukName
     */
    public function setProdukName($ProdukName)
    {
        $this->ProdukName = $ProdukName;
    }

    /**
     * @return mixed
     */
    public function getProdukDescription()
    {
        return $this->ProdukDescription;
    }

    /**
     * @param mixed $ProdukDescription
     */
    public function setProdukDescription($ProdukDescription)
    {
        $this->ProdukDescription = $ProdukDescription;
    }

    /**
     * @return mixed
     */
    public function getquantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setquantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getprice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setprice($price)
    {
        $this->price = $price;
    }



}