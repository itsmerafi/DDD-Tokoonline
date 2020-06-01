<?php

namespace Phalcon\Init\Cart\Domain\model;
use Phalcon\Init\Cart\Domain\Model\Item;

class Cart
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var Item[]
     */
    private $items;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->items =  array();
    }



    public function addItem(string $productId, Price $unitPrice, int $amount = 1): void
    {
        $this->items = new Item($productId, $unitPrice, $amount);
    }

    /**
     * @throws ProductNotInCartException
     */
    public function remove(string $productId): void
    {
        $key = $this->findKey($productId);
        $this->items->remove($key);
    }

    /**
     * @throws ProductNotInCartException
     */
    public function changeAmount(string $productId, int $amount): void
    {
        $item = $this->find($productId);
        $item->changeAmount($amount);
    }

    public function calculate():CartDetail
    {
        $detailItems = $this->items->map(function (Item $item): ItemDetail {
            return $item->toDetail();
        })->getValues();

        $prices = $this->items->map(function (Item $item): Price {
            return $item->calculatePrice();
        })->getValues();

        $totalPrice = Price::sum($prices);

        return new CartDetail(array_values($detailItems), $totalPrice);
    }

    /**
     * @throws ProductNotInCartException
     */
    private function find(string $productId): Item
    {
        foreach ($this->items as $item) {
            if ($item->getProductId() === $productId) {
                return $item;
            }
        }
        throw new ProductNotInCartException();
    }

    /**
     * @throws ProductNotInCartException
     */
    private function findKey(string $productId): string
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProductId() === $productId) {
                return $key;
            }
        }
        throw new ProductNotInCartException();
    }

    public function getId(): string
    {
        return $this->id;
    }
}