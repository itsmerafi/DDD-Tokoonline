<?php

return array(
    'backoffice' => [
        'namespace' => 'Phalcon\Init\BackOffice',
        'webControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Api',
        'className' => 'Phalcon\Init\BackOffice\Module',
        'path' => APP_PATH . '/modules/backoffice/Module.php',
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
        'defaultRouting' => false,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],

);