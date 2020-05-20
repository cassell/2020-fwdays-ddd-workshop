<?php

namespace Beeriously\Domain\Brewing\Session;

class BrewedOn
{
    /**
     * @var \DateTimeInterface
     */
    private $dateTime;

    public function __construct(\DateTimeInterface $dateTime)
    {
        if($dateTime < new \DateTimeImmutable('2020-05-19')) {
            throw new \InvalidArgumentException("Date too far in the past");
        }

        if($dateTime > new \DateTimeImmutable('2100-01-01')) {
            throw new \InvalidArgumentException("Date too far in the future");
        }

        $this->dateTime = new \DateTimeImmutable($dateTime->format('r'));

    }

    public function getValue(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

}



