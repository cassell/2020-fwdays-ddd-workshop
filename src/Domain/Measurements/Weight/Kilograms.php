<?php

declare(strict_types=1);

namespace Beeriously\Domain\Measurements\Weight;

class Kilograms
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function fromPounds(Pounds $pound)
    {
        return new self($pound->getValue() * Pounds::POUNDS_PER_KILOGRAM);
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    public function add(Kilograms $kilograms)
    {
        return new self($this->getValue() + $kilograms->getValue());
    }
}
