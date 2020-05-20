<?php

namespace Beeriously\Tests\Unit\Domain\Brewing\Session;

use Beeriously\Domain\Brewing\Session\BrewedOn;
use PHPUnit\Framework\TestCase;

class BrewedOnTest extends TestCase
{
    public function testGetter()
    {
        $brewedOn = new BrewedOn(new \DateTime("2020-05-21 00:00:00 +0000"));
        $this->assertEquals("Thu, 21 May 2020 00:00:00 +0000", $brewedOn->getValue()->format('r'));
    }

}


