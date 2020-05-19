<?php

namespace Phalcon\Init\Produk\Domain\Model;

class Produk
{
    /**
     * @var Id
     */
    private $id;
    /**
     * @var string $nama
     */
    private $name;
    /**
     * @var string $description
     */
    private $description;
    /**
     * @var string $quantity
     */
    private $quantity;
    /**
     * @var string $price
     */
    private $price;


    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function quantity()
    {
        return $this->quantity;
    }


    /**
     * @return string
     */
    public function price()
    {
        return $this->price;
    }

        public function __construct(ProdukId $id, $name, $description,$quantity,$price)
        {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->quantity = $quantity;
            $this->price = $price;
        }







}