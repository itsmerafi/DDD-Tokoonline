<?php

namespace Phalcon\Init\Cart;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Phalcon\Init\Cart\Domain\Model' => __DIR__ . '/domain/model',
            'Phalcon\Init\Cart\Infrastructure' => __DIR__ . '/infrastructure',
            'Phalcon\Init\Cart\Application' => __DIR__ . '/application',
            'Phalcon\Init\Cart\Controllers\Web' => __DIR__ . '/controllers/web',
            'Phalcon\Init\Cart\Controllers\Api' => __DIR__ . '/controllers/api',
            'Phalcon\Init\Cart\Controllers\Validators' => __DIR__ . '/controllers/validators',
            'Phalcon\Init\Cart\Models' => __DIR__ . '/models'
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }
}