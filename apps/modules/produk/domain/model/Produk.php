<?php

<?php

namespace Idy\Idea\Domain\Model;

use Exception;
use http\Client\Curl\User;
use Idy\Common\Events\DomainEventPublisher;
use Idy\Idea\Domain\Exception\InvalidRatingException;

class Idea
{
    /**
     * @var IdeaId
     */
    private $id;
    /**
     * @var string $nama
     */
    private $name;
    /**
     * @var string $description
     */
    private $description;
    /**
     * @var string $quantity
     */
    private $quantity;
    /**
     * @var string $price
     */
    private $price;
    

    public function __construct(IdeaId $id, $name, $description,$quantity,$price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return IdeaId
     */
    public function id() : IdeaId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description() : string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function quantity() : quantity
    {
        return $this->quantity;
    }


    /**
     * @return string
     */
    public function price()
    {
        return $this->price;
    }

}