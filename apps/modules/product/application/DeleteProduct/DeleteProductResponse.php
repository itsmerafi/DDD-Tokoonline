<?php

namespace Phalcon\Init\Product\Application\DeleteProduct;

use Phalcon\Init\Product\Application\GenericResponse;

class DeleteProductResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}