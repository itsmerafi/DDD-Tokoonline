<?php

$namespace = 'Phalcon\Init\Produk\Presentation\Controllers\Web';
$module = 'produk';

$router->addPost('/produk/add', [
    'namespace' => $namespace,
    'module' => $module,
    'controller' => 'produk',
    'action' => 'add'
]);

$router->addPost('/produk/vote', [
    'namespace' => $namespace,
    'module' => $module,
    'controller' => 'produk',
    'action' => 'vote'
]);

$router->addPost('/produk/rate', [
    'namespace' => $namespace,
    'module' => $module,
    'controller' => 'produk',
    'action' => 'rate'
]);


return $router;
