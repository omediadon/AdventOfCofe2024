<?php

namespace App\Handler\DayOne;

class PartOne extends DayOne{

    public function getResult(): int{
        $distance = 0;

        for($i = 0; $i < count($this->left); $i++){
            $distance += abs($this->left[$i] - $this->right[$i]);
        }

        return $distance;
    }
}