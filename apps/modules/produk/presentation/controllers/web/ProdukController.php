<?php

namespace Phalcon\Init\Produk\Presentation\Controllers\Web;

use Idy\Produk\Application\CreateNewProduk\CreateNewProdukRequest;
use Idy\Produk\Application\CreateNewProduk\CreateNewProdukService;
use Idy\Produk\Application\ViewAllProduks\ViewAllProduksService;
use Idy\Produk\Application\EditProduk\EditProdukRequest;
use Idy\Produk\Application\EditProduk\DeleteProdukService;
use Phalcon\Mvc\Controller;

class ProdukController extends Controller
{
    /**
     * @var ViewAllProduksService $viewAllProduksService
     */
    protected $viewAllProduksService;
    /**
     * @var CreateNewProdukService $createNewProdukService
     */
    protected $createNewProdukService;
    /**
     * @var EditProdukService $EditProdukService
     */
    protected $EditProdukService;
    /**
     * @var DeleteProdukService $DeleteProdukService
     */
    protected $DeleteProdukService;

    public function initialize()
    {
        $this->viewAllProduksService = $this->di->get('viewAllProduksService');
        $this->createNewProdukService = $this->di->get('createNewProdukService');
        $this->EditProdukService = $this->di->get('EditProdukService');
        $this->DeleteProdukService = $this->di->get('DeleteProdukService');
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
        $response = $this->viewAllProduksService->handle();
        $this->view->Produks = $response->get();

        return $this->view->pick('home');
    }

    public function addPageAction()
    {
        return $this->view->pick('add');
    }

    public function addAction()
    {
        $ProdukName = $this->request->getPost('ProdukName');
        $ProdukDescription = $this->request->getPost('ProdukDescription');
        $ProdukQuantity = $this->request->getPost('ProdukQuantity');
        $ProdukPrice = $this->request->getPost('ProdukPrice');

        $request = new CreateNewProdukRequest($ProdukName, $ProdukDescription, $ProdukQuantity, $ProdukPrice);
        $response = $this->createNewProdukService->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');

    }

    public function DeleteAction()
    {
        $request = new DeleteProdukRequest($this->request->getPost('ProdukId'));
        $response = $this->DeleteProdukService->handle($request);

        $response->getError()
            ? $this->flashSession->error($response->getMessage())
            : $this->flashSession->success($response->getMessage());

        return $this->response->redirect('');
    }

    public function DeleteAction()
    {
        $ProdukId = $this->request->getPost('ProdukId');
        $value = $this->request->getPost('value');
        $name = $this->request->getPost('name');

        $request = new DeleteProdukRequest($ProdukId, $value, $name);
        $response = $this->DeleteProdukService->handle($request);

        return $this->send($response->getMessage(), $response->getCode());
    }

}