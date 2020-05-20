<?php

namespace Phalcon\Init\Produk\Application\EditProduk;

use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Model\ProdukId;
use Phalcon\Init\Produk\Domain\Repository\ProdukRepository;

class EditProdukService
{
    private $ProdukRepository;

    public function __construct(
        ProdukRepository $ProdukRepository)
    {
        $this->ProdukRepository = $ProdukRepository;
    }

    /**
     * @param EditProdukRequest $request
     * @return EditProdukResponse
     */
    public function handle(EditProdukRequest $request) : EditProdukResponse
    {
        try {
            $prodID = new ProdukId($request->getProdukId());
            $response = $this->ProdukRepository->update($prodID,$request->getProdukName(),$request->getProdukDescription(),$request->getProdukQuantity(),$request->getProdukPrice());

            return new EditProdukResponse($response, "Produk created successfully.");
        } catch (InvalidEmailDomainException $domainException) {
            return new EditProdukResponse($domainException, $domainException->getMessage(), 400, true);
        } catch (\Exception $exception) {
            return new EditProdukResponse($exception, $exception->getMessage(), 500, true);
        }
    }

}