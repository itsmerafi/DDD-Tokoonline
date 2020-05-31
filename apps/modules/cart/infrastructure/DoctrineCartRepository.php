<?php

namespace Phalcon\Init\Cart\Infrastructure;
/*
 * ORM merupakan sebuah tools yang akan membentuk tabel di sebuah database
 * berdasarkan class yang didefinisikan oleh developer.
 */
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use Phalcon\Init\Cart\Domain\Cart;
use Phalcon\Init\Cart\Domain\CartNotFoundException;
use Phalcon\Init\Cart\Domain\CartRepository;
use TypeError;

class DoctrineCartRepository implements CartRepository
{

    /**
     * @var EntityManager
     */
    private $entityManger;

    public function __construct(EntityManager $entityManger)
    {
        $this->entityManger = $entityManger;
    }

    public function add(Cart $cart): void
    {
        $this->entityManger->persist($cart); //Menyimpan sementara
    }

    public function get(string $id): Cart
    {
        $queryBuilder = $this->entityManger->createQueryBuilder();
        $queryBuilder
            ->select('cart, items')
            ->from(Cart::class, 'cart')
            ->leftJoin('cart.items', 'items')
            ->where('cart.id = :id')
            ->setParameter(':id', $id);

        $query = $queryBuilder->getQuery();

        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            throw new CartNotFoundException();
        }
    }

    public function remove(string $id): void
    {
        $cart = $this->get($id);
        $this->entityManger->remove($cart);
    }
}
