<?php

namespace App\parking\transport;

use App\interfaces\Parkable;
use App\parking\space\SpaceSizeEnum;

class Moto implements Parkable {
	private int $size = SpaceSizeEnum::MOTO;

	public function getSize(): int {
		return $this->size;
	}
}