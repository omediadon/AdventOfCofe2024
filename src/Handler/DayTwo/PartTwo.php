<?php

namespace App\Handler\DayTwo;

class PartTwo extends DayTwo {
    public function getResult(): int {
        return array_reduce($this->data, function($safeReports, $line) {
            $numbers = array_map('intval', explode(' ', trim($line)));
            return $safeReports + ($this->isSafeReportsWithProblemDampener($numbers) ? 1 : 0);
        }, 0);
    }

    /**
     * This is an optimization of the solution found in PartOne, so I decided to include both
     * rather than moving one of them to DayTwo
     *
     * @param array<int, int> $report
     *
     * @return bool
     */
    private function isReportSafe(array $report): bool {
        $direction = null;

        for ($i = 1; $i < count($report); $i++) {
            $diff = $report[$i] - $report[$i - 1];

            if ($diff == 0 || abs($diff) > 3) {
                return false;
            }

            if ($direction === null) {
                $direction = $diff > 0;
            } elseif (($diff > 0) !== $direction) {
                return false;
            }
        }

        return true;
    }

    private function isSafeReportsWithProblemDampener(array $report): bool {
        if ($this->isReportSafe($report)) {
            return true;
        }

        $n = count($report);
        for ($i = 0; $i < $n; $i++) {
            $reducedLevels = $report;
            unset($reducedLevels[$i]);
            $reducedLevels = array_values($reducedLevels);

            if ($this->isReportSafe($reducedLevels)) {
                return true;
            }
        }

        return false;
    }
}