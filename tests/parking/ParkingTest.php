<?php

namespace parking;

use App\parking\Parking;
use App\parking\ParkingLevel;
use App\parking\space\Space;
use App\parking\space\SpaceSizeEnum;
use App\parking\transport\Auto;
use App\parking\transport\Bus;
use PHPUnit\Framework\TestCase;

class ParkingTest extends TestCase {
	public function testParkTransport() {
		$space1 = new Space('1', SpaceSizeEnum::MOTO);
		$space2 = new Space('2', SpaceSizeEnum::MOTO);
		$space3 = new Space('3', SpaceSizeEnum::AUTO);
		$space4 = new Space('4', SpaceSizeEnum::AUTO);
		$space5 = new Space('5', SpaceSizeEnum::BUS);

		$l1 = new ParkingLevel([$space1, $space2, $space3], 'L1');
		$l2 = new ParkingLevel([$space4, $space5], 'L2');
		$parking = new Parking([$l1, $l2]);

		$auto = new Auto();
		$bus = new Bus();

		$this->assertFalse($space5->isBusy());
		$this->assertFalse($space3->isBusy());

		$autoSpace = $parking->parkTransport($auto);
		$busSpace = $parking->parkTransport($bus);

		$this->assertTrue($space5->isBusy());
		$this->assertTrue($space3->isBusy());
	}
}
