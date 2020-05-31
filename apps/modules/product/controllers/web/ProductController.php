<?php

namespace Phalcon\Init\Product\Controllers\Web;


use Phalcon\Init\Product\Application\ViewAllProduct\ViewAllProductService;
use Phalcon\Init\Product\Application\CreateNewProduct\CreateNewProductRequest;
use Phalcon\Init\Product\Application\CreateNewProduct\CreateNewProductService;
use Phalcon\Init\Product\Application\EditProduct\EditProductRequest;
use Phalcon\Init\Product\Application\EditProduct\EditProductService;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductService;
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

    public function initialize()
    {
        $this->viewAllProductService = $this->di->get('viewAllProductService');
        $this->createNewProductService = $this->di->get('createNewProductService');
        $this->editProductService = $this->di->get('editProductService');
        $this->deleteProductService = $this->di->get('deleteProductService');
    }

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
        $response = $this->viewAllProductsService->handle();
        $this->view->Products = $response->get();

        return $this->view->pick('home');
    }

    public function addPageAction()
    {
        return $this->view->pick('add');
    }

    public function addAction()
    {
        $ProductName = $this->request->getPost('ProductName');
        $ProductDescription = $this->request->getPost('ProductDescription');
        $ProductQuantity = $this->request->getPost('ProductQuantity');
        $ProductPrice = $this->request->getPost('ProductPrice');

        $request = new CreateNewProductRequest($ProductName, $ProductDescription, $ProductQuantity, $ProductPrice);
        $response = $this->createNewProductService->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');

    }

    public function DeleteAction()
    {
        $request = new DeleteProductRequest($this->request->getPost('ProductId'));
        $response = $this->DeleteProductService->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');
    }

    public function UpdateAction(){
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