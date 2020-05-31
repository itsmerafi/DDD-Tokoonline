<?php

namespace Phalcon\Init\Product\Application\ViewAllProduct;

use Phalcon\Init\Product\Domain\Repository\ProductRepository;

class ViewAllProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        $Products = $this->repository->allProducts();

        return $Products;
    }
}