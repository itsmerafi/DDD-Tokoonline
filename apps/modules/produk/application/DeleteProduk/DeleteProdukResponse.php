<?php

namespace Phalcon\Init\Produk\Application\DeleteProduk;

use Phalcon\Init\Produk\Application\GenericResponse;

class DeleteProdukResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}