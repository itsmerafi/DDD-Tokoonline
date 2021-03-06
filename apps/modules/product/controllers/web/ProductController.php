<?php

namespace Phalcon\Init\Product\Controllers\Web;


use Phalcon\Init\Product\Application\ViewAllProduct\ViewAllProductService;
use Phalcon\Init\Product\Application\ViewAllProduct\ViewAllProductResponse;
use Phalcon\Init\Product\Application\CreateNewProduct\CreateNewProductRequest;
use Phalcon\Init\Product\Application\CreateNewProduct\CreateNewProductService;
use Phalcon\Init\Product\Application\EditProduct\EditProductRequest;
use Phalcon\Init\Product\Application\EditProduct\EditProductService;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductRequest;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductService;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductResponse;
use Phalcon\Mvc\Controller;

class ProductController extends Controller
{
    /**
     * @var ViewAllProductsService $viewAllProductsService
     */
    protected $viewAllProductService;
    /**
     * @var CreateNewProductService $createNewProductService
     */
    protected $createNewProductService;
    /**
     * @var EditProductService $editProductService
     */
    protected $editProductService;
    /**
     * @var DeleteProductService $deleteProductService
     */
    protected $deleteProductService;


    protected function send($data, $code = 200, $message = 'OK')
    {
        $this->response->setContentType('application/json');

        $json = json_encode($data, JSON_PRETTY_PRINT);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Failed to convert server response to JSON: ' . json_last_error_msg());
        }

        $this->response->setStatusCode($code, $message);
        $this->response->setContent($json);
        $this->response->send();
    }

    public function indexAction()
    {
        $productRepository = $this->di->getShared('product_repository');
        $service = new ViewAllProductService($productRepository);

        $response = $service->handle();
        $this->view->setVar('products', $response->products);
           return $this->view->pick('home');
    }

    public function addPageAction()
    {
        return $this->view->pick('add');
    }

    public function addAction()
    {
        $ProductName = $this->request->getPost('productName');
        $ProductDescription = $this->request->getPost('productDescription');
        $ProductQuantity = $this->request->getPost('productQuantity');
        $ProductPrice = $this->request->getPost('productPrice');

        $productRepository = $this->di->getShared('product_repository');

        $request = new CreateNewProductRequest($ProductName, $ProductDescription, $ProductQuantity, $ProductPrice);
        $service = new CreateNewProductService($productRepository);

        $response=$service->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');

    }

    public function deleteAction()
    {
        $productRepository = $this->di->getShared('product_repository');
        $reqId=$this->request->getPost('productId');
        $request = new DeleteProductRequest($reqId);
        $service = new DeleteProductService($productRepository);
        $response = $service->execute($request);
        //echo $response->getMessage();
        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');
    }

    public function updateAction(){
        $prodId = $this->request->getPost('ProductId');
        $ProductName = $this->request->getPost('ProductName');
        $ProductDescription = $this->request->getPost('ProductDescription');
        $ProductQuantity = $this->request->getPost('ProductQuantity');
        $ProductPrice = $this->request->getPost('ProductPrice');

        $request = new EditProductRequest($ProductId, $ProductName, $ProductDescription, $quantity, $price);
        $response = $this->EditProductService->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');
    }

}