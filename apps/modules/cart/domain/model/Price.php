<?php


namespace Phalcon\Init\Cart\Domain\Model;


use Litipk\BigNumbers\Decimal;
class Price
{
    private const DECIMALS = 2;

    /**
     * @var Decimal
     */
    private $withVat;

    public function __construct(string $withVat)
    {
        $withHigherPrecision = Decimal::fromString($withVat, self::DECIMALS + 1);
        $truncated = $withHigherPrecision->floor(self::DECIMALS);
        $this->withVat = $truncated;
    }

    /**
     * @param self[] $pri   ces
     * @return self
     */
    public static function sum(array $prices): self
    {
        return array_reduce($prices, function (self $carry, self $price) {
            return $carry->add($price);
        }, new self('0'));
    }

    public function getWithVat(): string
    {
        return (string) $this->withVat->floor(self::DECIMALS);
    }

    public function add(self $adder): self
    {
        $withVat = $this->withVat->add($adder->withVat);
        return self::fromDecimal($withVat);
    }

    public function multiply(int $multiplier): self
    {
        $withVat = $this->withVat->mul(Decimal::fromInteger($multiplier));
        return self::fromDecimal($withVat);
    }

    private static function fromDecimal(Decimal $withVat): self
    {
        return new self($withVat->floor(self::DECIMALS));
    }
    
}