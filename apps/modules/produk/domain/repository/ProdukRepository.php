<?php

namespace Phalcon\Init\Produk\Domain\Repository;

use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Model\ProdukId;

interface ProdukRepository
{
    public function byId(ProdukId $id);
    public function save(Produk $Produk);
    public function allProduks();
    public function deleteProdukById(ProdukId $id);
    public function update(Produk $id, $name,$description,$quantity,$price);
}