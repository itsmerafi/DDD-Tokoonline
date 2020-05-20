<?php


namespace Phalcon\Init\Produk\Application;


use Phalcon\Init\Produk\Domain\Model\Product;
use Phalcon\Init\Produk\Domain\Model\ProductRepository;

class ViewAllProductService
{
    private $productRepository;

    /**
     * ViewAllProductService constructor.
     * @param $productRepository
     */
    public function __construct(ProductRepository $productRepository )
    {
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        $products = $this->productRepository->all();
        $response = new ViewAllProductResponse();
//
//        if($products)
//            foreach ($products as $row){
//                $response->addProductResponse(
//                    $row->id(),
//                    $row->name(),
//                    $row->description(),
//                    $row->quantity(),
//                    $row->price()
//                );
//            }

        //return $response;
        return $products;
    }
}