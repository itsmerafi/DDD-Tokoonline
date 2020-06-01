<?php

namespace Phalcon\Init\Cart\Infrastructure;

use Phalcon\Init\Cart\Domain\Model\CartRepository;
use Phalcon\DiInterface;
use Phalcon\Init\Cart\Domain\Model\Cart;
use Phalcon\Init\Cart\Domain\Model\Price;


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


    public function getById(string $id): Cart
    {
        // TODO: Implement getById() method.
        $db = $this->di->getShared('db');
        $sql = "SELECT * From cart where cart_id = :id ";
        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC,['id' => $id]);

        if($result) {
            $cart = new Cart((string)$row['cart_id']);
            foreach($result as $row) {
                $cart->addItem((string) $row['product'], new Price($row['unit_price']), $row['amount']);
            }
            return $cart;
        }
        return null;

    }
}