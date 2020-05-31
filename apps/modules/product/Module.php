<?php

namespace Phalcon\Init\Product;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Phalcon\Init\Product\Domain\Repository' => __DIR__ . '/domain/repository',
            'Phalcon\Init\Product\Domain\Model' => __DIR__ . '/domain/model',
            'Phalcon\Init\Product\Infrastructure' => __DIR__ . '/infrastructure',
            'Phalcon\Init\Product\Application' => __DIR__ . '/application',
            'Phalcon\Init\Product\Controllers\Web' => __DIR__ . '/controllers/web',
            'Phalcon\Init\Product\Controllers\Api' => __DIR__ . '/controllers/api',
            'Phalcon\Init\Product\Controllers\Validators' => __DIR__ . '/controllers/validators',
            'Phalcon\Init\Product\Models' => __DIR__ . '/models'
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