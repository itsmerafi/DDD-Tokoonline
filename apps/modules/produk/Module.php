<?php

namespace Phalcon\Init\Produk;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Phalcon\Init\Produk\Domain\Model' => __DIR__ . '/domain/model',
            'Phalcon\Init\Produk\Infrastructure' => __DIR__ . '/infrastructure',
            'Phalcon\Init\Produk\Application' => __DIR__ . '/application',
            'Phalcon\Init\Produk\Controllers\Web' => __DIR__ . '/controllers/web',
            'Phalcon\Init\Produk\Controllers\Api' => __DIR__ . '/controllers/api',
            'Phalcon\Init\Produk\Controllers\Validators' => __DIR__ . '/controllers/validators',
            'Phalcon\Init\Produk\Models' => __DIR__ . '/models'
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