<?php

namespace Phalcon\Init\Product\Application\EditProduct;

use Phalcon\Init\Product\Application\GenericResponse;

class EditProductResponse extends GenericResponse
{
    public function __construct($data, $message, $code = 200, $error = null)
    {
        parent::__construct($data, $message, $code, $error);
    }
}