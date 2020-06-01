<?php


namespace Phalcon\Init\Cart\Domain;


class CartRepositoryImpl implements CartRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function remove(string $id): void
    {
        // TODO: Implement remove() method.
    }

    public function addItem(Cart $cart)
    {
        // TODO: Implement addItem() method.
        $db = $this->di->getShared('db');

        $sql = "INSERT INTO cart (cart_id, product_id, unit_price, amount)
                VALUES (:cart_id, :product_id, :unit_price, :amount)";

        $result =$db->query($sql, [
            'cart_id' => $cart->getId(),
            'product_id' => $cart->calculate()->getItems()[0]->getProductId(),
            'unit_price' => $cart->calculate()->getItems()[0]->getPrice(),
            'amount' => $cart->calculate()->getItems()[0]->getAmount()
        ]);

    }

    public function createCart(string $) : Cart{
        // TODO: Implement createCart() method.
    }

    public function getById(string $id): Cart
    {
        // TODO: Implement getById() method.
    }
}