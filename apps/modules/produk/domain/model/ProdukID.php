<?php

namespace Phalcon\Init\Domain\Model;

use Ramsey\Uuid\Uuid;

class ProdukId
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() 
    {
        return $this->id;
    }

    public function equals(IdeaId $ideaId)
    {
        return $this->id === $ideaId->id;
    }

}