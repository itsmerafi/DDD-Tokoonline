<?php

namespace Phalcon\Init\Product\Application\CreateNewProduct;

use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Repository\ProductRepository;

class CreateNewProductService
{
    private $ProductRepository;

    public function __construct(
        ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     * @param CreateNewProductRequest $request
     * @return CreateNewProductResponse
     */
    public function handle(CreateNewProductRequest $request) : CreateNewProductResponse
    {
        try {
            $Product = Product::makeProduct($request->getProductName(), $request->getProductDescription(),$request->getProductQuantity(),$request->getProductPrice());
            $response = $this->ProductRepository->save($Product);

            return new CreateNewProductResponse($response, "Product created successfully.");
        } catch (InvalidEmailDomainException $domainException) {
            return new CreateNewProductResponse($domainException, $domainException->getMessage(), 400, true);
        } catch (\Exception $exception) {
            return new CreateNewProductResponse($exception, $exception->getMessage(), 500, true);
        }
    }

}