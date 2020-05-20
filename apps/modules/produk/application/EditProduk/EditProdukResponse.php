<?php

namespace Phalcon\Init\Produk\Application\EditProduk;

use Phalcon\Init\Produk\Application\GenericResponse;

class EditProdukResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}