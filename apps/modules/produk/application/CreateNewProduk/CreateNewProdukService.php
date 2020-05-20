<?php

namespace Phalcon\Init\Produk\Application\CreateNewProduk;

use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Repository\ProdukRepository;

class CreateNewProdukService
{
    private $ProdukRepository;

    public function __construct(
        ProdukRepository $ProdukRepository)
    {
        $this->ProdukRepository = $ProdukRepository;
    }

    /**
     * @param CreateNewProdukRequest $request
     * @return CreateNewProdukResponse
     */
    public function handle(CreateNewProdukRequest $request) : CreateNewProdukResponse
    {
        try {
            $Produk = Produk::makeProduk($request->getProdukName(), $request->getProdukDescription(),$request->getProdukQuantity(),$request->getProdukPrice());
            $response = $this->ProdukRepository->save($Produk);

            return new CreateNewProdukResponse($response, "Produk created successfully.");
        } catch (InvalidEmailDomainException $domainException) {
            return new CreateNewProdukResponse($domainException, $domainException->getMessage(), 400, true);
        } catch (\Exception $exception) {
            return new CreateNewProdukResponse($exception, $exception->getMessage(), 500, true);
        }
    }

}