<?php

return array(
    'produk' => [
        'namespace' => 'Phalcon\Init\Produk',
        'webControllerNamespace' => 'Phalcon\Init\Produk\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Produk\Controllers\Api',
        'className' => 'Phalcon\Init\Produk\Module',
        'path' => APP_PATH . '/modules/produk/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],

    'dashboard' => [
        'namespace' => 'Phalcon\Init\Dashboard',
        'webControllerNamespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Dashboard\Controllers\Api',
        'className' => 'Phalcon\Init\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ],


    'cart' => [
        'namespace' => 'Phalcon\Init\Cart',
        'webControllerNamespace' => 'Phalcon\Init\Cart\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Cart\Controllers\Api',
        'className' => 'Phalcon\Init\Cart\Module',
        'path' => APP_PATH . '/modules/cart/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'cart',
        'defaultAction' => 'Index'
    ],


);