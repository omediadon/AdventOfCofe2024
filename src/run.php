<?php

use App\Command\ChallengeCommand;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application('AdventOfCode', '2024.0.0');

$app->add(new ChallengeCommand());

$app->run();