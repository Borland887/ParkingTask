<?php

namespace App\parking;

use App\interfaces\Parkable;
use App\interfaces\ParkingSpaceInterface;
use App\parking\space\Space;

class ParkingLevel {
	/**
	 * @var Space[]
	 */
	private array $spaces;
	private string $id;

	/**
	 * @param ParkingSpaceInterface[] $spaces
	 * @param string $id
	 */
	public function __construct(array $spaces, string $id) {
		$this->spaces = $spaces;

		foreach ($this->spaces as $space) {
			$space->attacheLevel($this);
		}

		$this->id = $id;
	}

	public function getFirstFreeSpace(Parkable $transport): ?Space {
		$result = null;
		foreach ($this->spaces as $space) {
			if ($space->canPark($transport)) {
				$result = $space;
				break;
			}
		}

		return $result;
	}

	public function getId(): string {
		return $this->id;
	}
}