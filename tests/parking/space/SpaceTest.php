<?php

namespace parking\space;

use App\parking\space\Space;
use App\parking\space\SpaceSizeEnum;
use App\parking\transport\Bus;
use App\parking\transport\Moto;
use PHPUnit\Framework\TestCase;

class SpaceTest extends TestCase {

	public function testIsBusy() {
		$transport = new Moto();

		$space = new Space("0", SpaceSizeEnum::BUS);
		$this->assertFalse($space->isBusy());

		$space->setTransport($transport);
		$this->assertTrue($space->isBusy());

		$busFromSpace = $space->getTransport();
		$this->assertEquals($busFromSpace, $transport);
		$this->assertTrue($space->isBusy());

		$space->free();
		$this->assertFalse($space->isBusy());
	}

	public function testCanPark() {
		$bus = new Bus();
		$moto = new Moto();

		$space = new Space("0", SpaceSizeEnum::MOTO);

		$this->assertFalse($space->canPark($bus));
		$this->assertTrue($space->canPark($moto));
	}
}
