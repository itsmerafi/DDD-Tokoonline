<?php
namespace Phalcon\Init\Produk\Infrastructure;

use Phalcon\Init\Produk\Domain\Model\ProductRepository;
use Phalcon\DiInterface;
use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Model\ProdukID;

class SqlProductRepository implements ProductRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }
    public function all(): ?array
    {

        // TODO: Implement all() method.

        $db = $this->di->getShared('db');
        $sql = "select * from product";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);

        if($result)
            return $result;


        return null;
    }
}