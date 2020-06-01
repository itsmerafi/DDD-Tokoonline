<?php

namespace Phalcon\Init\Cart\Domain\Model;

class CartDetail
{

    /**
     * @var ItemDetail[]
     */
    private $items;

    /**
     * @var Price
     */
    private $totalPrice;

    /**
     * @param ItemDetail[] $items
     * @param Price $totalPrice
     */
    public function __construct(array $items, Price $totalPrice )
    {
        $this->items = $items;
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return ItemDetail[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalPrice(): Price
    {
        return $this->totalPrice;
    }
}
