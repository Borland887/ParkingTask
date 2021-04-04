<?php

namespace App\interfaces;

interface ParkingSpaceInterface {
	public function getId(): string;

	public function isBusy(): bool;

	public function setTransport(Parkable $transport): void;

	public function canPark(Parkable $transport): bool;
}