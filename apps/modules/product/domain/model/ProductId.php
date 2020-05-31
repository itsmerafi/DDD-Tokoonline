<?php

namespace Phalcon\Init\ProductId\Domain\Model;



use Ramsey\Uuid\Uuid;

class ProductId
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id()
    {
        return $this->id;
    }

    public function equals(ProdukId $produkId)
    {
        return $this->id === $produkId->id;
    }

}