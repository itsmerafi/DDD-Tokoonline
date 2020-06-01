<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Init\Product\Domain\Repository\ProductRepository;
use Phalcon\Init\Product\Infrastructure\Persistence\SqlProductRepository;
use Phalcon\Init\Product\Application\ViewAllProduct\ViewAllProductService;
use Phalcon\Init\Product\Application\CreateNewProduct\CreateNewProductService;
use Phalcon\Init\Product\Application\EditProduct\EditProductService;
use Phalcon\Init\Product\Application\DeleteProduct\DeleteProductService;

//use Idy\Common\Events\DomainEventPublisher;
//use Phalcon\Init\Produk\Application\SendRatingNotificationEmailService;

$di['voltServiceMail'] = function($view) use ($di) {

    $config = $di->get('config');

    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->mail->cacheDir)) {
        mkdir($config->mail->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->mail->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di['db'] = function () use ($di) {

    $config = $di->get('config');

    $dbAdapter = $config->database->adapter;

    return new $dbAdapter([
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->dbname
    ]);
};

// $di->setShared('sql_product_repository', function() use ($di) {
//     $repo = new SqlProductRepository($di->get('db'));

//     return $repo;
// });


// $di->setShared('event_publisher', function() use ($di) {
//     $instance = DomainEventPublisher::instance();

//     $instance->subscribe(
//         new SendRatingNotificationEmailService()
//     );

//     return $instance;
// });

$di->setShared('product_repository', function() use ($di) {
     return new SqlProductRepository($di->get('db'));
 });

// $di->set('viewAllProductService', function () use ($di) {
//    return new ViewAllProductService($di->get('product_repository'));
// });

// $di->set('createNewProductService', function () use ($di) {
//    return new CreateNewProductService($di->get('product_repository'));
// });

// $di->set('editProductService', function () use ($di) {
//    return new EditProductService($di->get('product_repository'));
// });

// $di->set('deleteProductService', function () use ($di) {
//    return new DeleteProductService($di->get('product_repository'));
// });