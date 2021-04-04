<?php

namespace App\parking\space;

use App\interfaces\Parkable;
use App\interfaces\ParkingSpaceInterface;
use App\parking\ParkingLevel;

use Exception;

class Space implements ParkingSpaceInterface {
	private ?Parkable $transport = null;
	private ?ParkingLevel $level = null;

	private int $size;
	private string $id;

	public function __construct(string $id, int $size) {
		$this->id = $id;
		$this->size = $size;
	}

	public function getId(): string {
		return $this->id;
	}

	public function isBusy(): bool {
		return $this->transport !== null;
	}

	public function setTransport(Parkable $transport): void {
		if ($this->isBusy() === true) {
			throw new Exception("Set transport on busy space");
		}

		$this->transport = $transport;
	}

	public function getTransport(): Parkable {
		return $this->transport;
	}

	public function free(): void {
		$this->transport = null;
	}

	public function canPark(Parkable $transport): bool {
		return $transport->getSize() <= $this->size && $this->isBusy() === false;
	}

	public function attacheLevel(ParkingLevel $level): void {
		$this->level = $level;
	}

	public function getParkingId(): string {
		return $this->level->getId() . "-" . $this->id;
	}
}