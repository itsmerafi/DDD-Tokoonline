<?php

namespace Phalcon\Init\Product\Application\DeleteProduct;

use Phalcon\Init\Product\Domain\Repository\ProductRepository;

class DeleteProductService
{
    protected $ProductRepository;

    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    public function execute(DeleteProductRequest $request)
    {
        try {
            $this->ProductRepository->deleteByID($request->getProductId());
            return new DeleteProductResponse('Hapus Product berhasil.');
        }
        catch(\Exception $e) {
            return new DeleteProductResponse($e->getMessage(), TRUE);
        }
    }
}