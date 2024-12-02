<?php
/*
 * Created by Pocket PHP on Samsung S21
 * You can change PHP settings
 * in etc/php.ini
 */

function isSafeReport(array $numbers): bool {
    $increasing = true;
    $decreasing = true;

    for ($i = 0, $n = count($numbers) - 1; $i < $n; $i++) {
        $diff = abs($numbers[$i + 1] - $numbers[$i]);

        if ($diff > 3 || $diff < 1) {
            return false; 
        }

        if ($numbers[$i + 1] > $numbers[$i]) {
            $decreasing = false; 
        } elseif ($numbers[$i + 1] < $numbers[$i]) {
            $increasing = false; 
        }
    }

    return $increasing || $decreasing;
}

function countSafeReports(string $filePath): int {
    $safeReportCount = 0;
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $numbers = array_map('intval', explode(' ', trim($line)));
        if (isSafeReport($numbers)) {
            $safeReportCount++;
        }
    }

    return $safeReportCount;
}


$filePath = 'day2.txt'; 
var_dump(countSafeReports($filePath));

