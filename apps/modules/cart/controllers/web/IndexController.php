<?php

namespace Phalcon\Init\Cart\Controllers\Web;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('index');
    }

}