<?php

namespace Phalcon\Init\Product\Application\CreateNewProduct;

use Phalcon\Init\Product\Application\GenericResponse;

class CreateNewProductResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}