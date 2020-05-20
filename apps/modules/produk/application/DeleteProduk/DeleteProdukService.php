<?php

namespace Phalcon\Init\Produk\Application\DeleteProduk;

use Phalcon\Init\Produk\Domain\Repository\ProdukRepository;

class DeleteProdukService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute(DeleteProdukRequest $request)
    {
        try {
            $this->produkRepository->deleteByID($request->getProdukId());
            return new DeleteProdukResponse('Hapus produk berhasil.');
        }
        catch(\Exception $e) {
            return new DeleteProdukResponse($e->getMessage(), TRUE);
        }
    }
}