<?php
namespace Phalcon\Init\Cart\Application;

use Phalcon\Init\Cart\Domain\Model\CartRepository;
use Phalcon\Init\Cart\Application\ViewCartResponse;


class ViewCartService
{
    private $cartRepository;

    public function __construct(
        CartRepository  $cartRepositoryImpl
    )
    {
        $this->cartRepository = $cartRepositoryImpl;
    }

    public function execute($Id)
    {
        $cart = $this->cartRepository->getById($Id);
        $response = new ViewCartResponse();

        return 'bambang';




    }
}