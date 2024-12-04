<?php

namespace App\Handler\DayOne;

class PartTwo extends DayOne{

    public function getResult(): int{
        $accuracy    = 0;
        $rightCounts = array_count_values($this->right);

        foreach($this->left as $number){
            $occurrences = $rightCounts[$number] ?? 0;
            $accuracy    += $number * $occurrences;
        }

        return $accuracy;
    }
}