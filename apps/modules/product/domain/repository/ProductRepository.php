<?php

namespace Phalcon\Init\Product\Domain\Repository;

use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Model\ProductId;

interface ProductRepository
{
    public function byId(ProductId $id);
    public function save(Product $Product);
    public function allProducts();
    public function deleteProductById(ProductId $id);
    public function update(ProductId $id, $name,$description,$quantity,$price);
}