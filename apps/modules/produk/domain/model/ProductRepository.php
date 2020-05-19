<?php
namespace Phalcon\Init\Produk\Domain\Model;

interface ProductRepository
{
    public function all(): ?array;
}