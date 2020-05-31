<?php

namespace Phalcon\Init\Product\Application\EditProduct;

use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Model\ProductId;
use Phalcon\Init\Product\Domain\Repository\ProductRepository;

class EditProductService
{
    private $ProductRepository;

    public function __construct(
        ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     * @param EditProductRequest $request
     * @return EditProductResponse
     */
    public function handle(EditProductRequest $request) : EditProductResponse
    {
        try {
            $prodID = new ProductId($request->getProductId());
            $response = $this->ProductRepository->update($prodID,$request->getProductName(),$request->getProductDescription(),$request->getProductQuantity(),$request->getProductPrice());

            return new EditProductResponse($response, "Product created successfully.");
        } catch (InvalidEmailDomainException $domainException) {
            return new EditProductResponse($domainException, $domainException->getMessage(), 400, true);
        } catch (\Exception $exception) {
            return new EditProductResponse($exception, $exception->getMessage(), 500, true);
        }
    }

}