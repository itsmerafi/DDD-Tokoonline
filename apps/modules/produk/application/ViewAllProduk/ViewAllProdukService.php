<?php

namespace Phalcon\Init\Produk\Application\ViewAllProduk;

use Phalcon\Init\Produk\Domain\Repository\ProdukRepository;

class ViewAllProduksService
{
    protected $repository;

    public function __construct(ProdukRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        $Produks = $this->repository->allProduks();

        return $Produks;
    }
}