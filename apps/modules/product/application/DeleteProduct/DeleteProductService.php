<?php

namespace Phalcon\Init\Product\Application\DeleteProduct;

use Phalcon\Init\Product\Domain\Repository\ProductRepository;
use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Model\ProductId;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductRequest;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductResponse;

class DeleteProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(DeleteProductRequest $request)
    {
        $productId = new ProductId($request->getProductId());
        //$productfromdb= $this->ProductRepository->byId($productId);
        try {
            $response=$this->productRepository->deleteProductById($productId);
            return new DeleteProductResponse($response,"Product Telah Berhasil Dihapus");
        }
        catch(\Exception $e) {
            return new DeleteProductResponse($e->getMessage(), TRUE);
        }
    }
}