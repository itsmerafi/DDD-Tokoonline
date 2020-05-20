<?php

namespace Phalcon\Init\Produk\Application\CreateNewProduk;

use Phalcon\Init\Produk\Application\GenericResponse;

class CreateNewProdukResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}