<?php

namespace Phalcon\Init\Product\Application\DeleteProduct;

class DeleteProductRequest
{
    public $ProductId;
    
    public function __construct($ProductId)
    {
        $this->ProductId = $ProductId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->ProductId;
    }

    /**
     * @param mixed $ProductId
     */
    public function setProductId($ProductId)
    {
        $this->ProductId = $ProductId;
    }

}