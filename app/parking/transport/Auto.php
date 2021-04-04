<?php

namespace App\parking\transport;

use App\interfaces\Parkable;
use App\parking\space\SpaceSizeEnum;

class Auto implements Parkable {
	private int $size = SpaceSizeEnum::AUTO;

	public function getSize(): int {
		return $this->size;
	}
}