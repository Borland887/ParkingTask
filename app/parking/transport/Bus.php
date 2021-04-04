<?php

namespace App\parking\transport;

use App\interfaces\Parkable;
use App\parking\space\SpaceSizeEnum;

class Bus implements Parkable {
	private int $size = SpaceSizeEnum::BUS;

	public function getSize(): int {
		return $this->size;
	}
}