<?php

namespace App\Handler;

interface HandlerInterface{
	public function getResult(): int|string|array;
}