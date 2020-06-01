<?php

namespace Phalcon\Init\Product\Domain\Model;

use Exception;
use http\Client\Curl\User;
use Phalcon\Init\Common\Events\DomainEventPublisher;
use Phalcon\Init\Product\Domain\Exception\InvalidRatingException;
use Phalcon\Init\Product\Domain\Model\ProductId;

class Product
{
    /**
     * @var ProductId
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
    

    public function __construct(
        ProductId $id,
        string $name,
        string $description,
        int  $quantity,
        int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return ProductId
     */
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

    public function makeProduct($name,$description,$quantity,$price):Product{
        return new Product(new ProductId(),$name,$description,$quantity,$price);
    }

    public function substractStock($value){

        if($this->quantity>$value){
            $this->quantity=$this->quantity-$value;
        }

    }

}