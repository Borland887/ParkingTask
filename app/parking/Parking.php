<?php

namespace App\parking;

use App\interfaces\Parkable;
use App\parking\space\Space;

class Parking {
	/**
	 * @var ParkingLevel[]
	 */
	private array $levels;

	public function __construct(array $levels = []) {
		$this->levels = $levels;
	}

	public function parkTransport(Parkable $transport): ?Space {
		$result = null;

		foreach ($this->levels as $level) {
			$space = $level->getFirstFreeSpace($transport);

			if ($space !== null) {
				$space->setTransport($transport);
				$result = $space;
				break;
			}
		}

		return $result;
	}

	public function canPark(Parkable $transport): bool {
		$result = false;

		foreach ($this->levels as $level) {
			$space = $level->getFirstFreeSpace($transport);

			if ($space !== null) {
				$result = true;
				break;
			}
		}

		return $result;
	}
}
