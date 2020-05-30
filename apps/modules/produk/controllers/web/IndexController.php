<?php
namespace Phalcon\Init\Produk\Controllers\web;


use Phalcon\Init\Produk\Application\ViewAllProductService;
use Phalcon\Mvc\Controller;
use Phalcon\Init\Produk\Application\ViewAllProductResponse;
use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Model\ProdukID;
class IndexController extends Controller
{
    
    public function indexAction()
    {

        $productRepository = $this->di->getShared('sql_product_repository');
        $service = new ViewAllProductService($productRepository);

        $response = $service->execute();
        $this->view->setVar('products', $response);
           return $this->view->pick('index');
//

    }

}