<?php

namespace App\Handler\DayTwo;

class PartOne extends DayTwo{

				public function getResult(): int{
					$safeReportCount = 0;

					foreach($this->data as $line){
									$numbers = array_map('intval', explode(' ', trim($line)));
									if($this->isSafeReport($numbers)){
													$safeReportCount++;
									}
					}

					return $safeReportCount;
				}

				private function isSafeReport(array $numbers,): bool{
								$increasing = true;
								$decreasing = true;

								for($i = 0, $n = count($numbers) - 1; $i < $n; $i++){
												$diff = abs($numbers[$i + 1] - $numbers[$i]);

												if($diff > 3 || $diff < 1){
																return false;
												}

												if($numbers[$i + 1] > $numbers[$i]){
																$decreasing = false;
												}
												else if($numbers[$i + 1] < $numbers[$i]){
																$increasing = false;
												}
								}

								return $increasing || $decreasing;
				}
}