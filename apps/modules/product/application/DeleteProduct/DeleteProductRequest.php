<?php

namespace Phalcon\Init\Product\Application\DeleteProduct;

class DeleteProductRequest
{
    public $productId;
    
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $ProductId
     */
    public function setProductId($productId):void
    {
        $this->productId = $productId;
    }

}