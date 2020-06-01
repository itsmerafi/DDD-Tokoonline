<?php

namespace Phalcon\Init\Product\Application\ViewAllProduct;

use Phalcon\Init\Product\Domain\Repository\ProductRepository;
use Phalcon\Init\Product\Application\ViewAllProduct\ViewAllProductResponse;

class ViewAllProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        $products = $this->repository->allProducts();
        $response = new ViewAllProductResponse();

        if($products)
            foreach ($products as $row){
                $response->addProductResponse(
                    $row->id()->id(),
                    $row->name(),
                    $row->description(),
                    $row->quantity(),
                    $row->price()
                );
            }

        return $response;
    }
}