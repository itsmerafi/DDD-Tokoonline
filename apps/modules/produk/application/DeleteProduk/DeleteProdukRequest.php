<?php

namespace Phalcon\Init\Produk\Application\DeleteProduk;

class DeleteProdukRequest
{
    public $ProdukId;
    
    public function __construct($ProdukId)
    {
        $this->ProdukId = $ProdukId;
    }

    /**
     * @return mixed
     */
    public function getProdukId()
    {
        return $this->ProdukId;
    }

    /**
     * @param mixed $ProdukId
     */
    public function setProdukId($ProdukId)
    {
        $this->ProdukId = $ProdukId;
    }

}