<?php
/*
 * Created by Pocket PHP on Samsung S21
 * You can change PHP settings
 * in etc/php.ini
 */

function splitNumbersIntoPairs(string $input): array {
    $left = [];
    $right = [];

    // Split the string by any amount of whitespace
    $numbers = preg_split('/\s+/', trim($input));

    // Loop through the numbers in pairs
    for ($i = 0; $i < count($numbers); $i += 2) {
        $left[] = (int)$numbers[$i];
        $right[] = (int)$numbers[$i + 1];
    }
    
    sort($left);
    sort($right);

    return ['left' => $left, 'right' => $right];
}

function calculateAccuracyScore(array $left, array $right): int {
    $accuracy = 0;
    $rightCounts = array_count_values($right);

    foreach ($left as $number) {
        $occurrences = $rightCounts[$number] ?? 0;
        $accuracy += $number * $occurrences;
    }

    return $accuracy;
}

$numbers="3 4 4 3 2 5 1 3 3 9 3 3";

$result = splitNumbersIntoPairs($numbers);

$distance = 0;

for($i =0; $i < count($result['left']); $i++){
    $distance += abs($result['left'][$i]-$result['right'][$i]);
}

$accuracyScore = calculateAccuracyScore($result['left'], $result['right']);

var_dump($distance, $accuracyScore);

