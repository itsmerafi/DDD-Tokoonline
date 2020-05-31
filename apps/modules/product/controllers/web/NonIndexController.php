<?php
namespace Phalcon\Init\Product\Controllers\web;


use Phalcon\Init\Product\Application\ViewAllProductService;
use Phalcon\Mvc\Controller;
use Phalcon\Init\Product\Application\ViewAllProductResponse;
use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Model\ProductID;
class IndexController extends Controller
{
    
    public function indexAction()
    {

        $productRepository = $this->di->getShared('sql_producta_repository');
        $service = new ViewAllProductService($productRepository);

        $response = $service->execute();
        $this->view->setVar('products', $response->products);
           return $this->view->pick('home');
//

    }

}