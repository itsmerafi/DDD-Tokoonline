<?php

namespace Phalcon\Init\Cart\Controllers\Web;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('index');
    }

    public function  addAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('productId');
            $this->view->setVar('work', $id);

        }
        else {
            $this->view->setVar('work', 'no');
        }
        $this->view->pick('index');

    }
}