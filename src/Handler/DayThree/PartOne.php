<?php

namespace App\Handler\DayThree;

class PartOne extends DayThree{
				public function getResult(): int{
					preg_match_all('/mul\((?\'left\'\d{1,3}),(?\'right\'\d{1,3})\)/', $this->data, $output);
					$total = 0;
					foreach($output['left'] as $i => $val){
									$total += intval($val) * intval($output['right'][$i]);
					}

					return $total;
				}
}