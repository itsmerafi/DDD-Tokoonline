<?php

namespace Phalcon\Init\Produk\Domain\Model;



use Ramsey\Uuid\Uuid;

class ProdukId
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