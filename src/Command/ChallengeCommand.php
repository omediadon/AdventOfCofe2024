<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ChallengeCommand extends Command{
    private array $theNumbers = [
        "One",
        "Two",
        "Three",
        "Four",
        "Five",
        "Six",
        "Seven",
        "Eight",
        "Nine",
        "Ten",
        "Eleven",
        "Twelve",
        "Thirteen",
        "Fourteen",
        "Fifteen",
        "Sixteen",
        "Seventeen",
        "Eighteen",
        "Nineteen",
        "Twenty",
        "TwentyOne",
        "TwentyTwo",
        "TwentyThree",
        "TwentyFour",
        "TwentyFive"
    ];

    protected function configure(){
        $this->setName('challenge')
             ->setDescription('Let The Challenge Begin!')
             ->setHelp('This command executes the problem\'s solution for specified day on your input file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output,): int{
        $helper = new QuestionHelper();

        $dayQuestion   = new Question('Which day: ', '1');
        $partQuestion  = new Question('What part: ', '1');
        $inputQuestion = new Question('Where\'s the input data (None means you want to use the default input): ', '');

        do{
            $day = $helper->ask($input, $output, $dayQuestion);
        }
        while(!is_numeric($day) || $day <= 0 || $day > 25);

        do{
            $part = $helper->ask($input, $output, $partQuestion);
        }
        while(!is_numeric($part) || $part <= 0 || $part > 2);

        $inputData = $helper->ask($input, $output, $inputQuestion);

        $cls = sprintf("App\\Handler\\Day%s\\Part%s", $this->theNumbers[intval($day) - 1], $this->theNumbers[intval($part) - 1]);

        $challenge = new $cls($inputData);
        $output->writeln("Your result is: " . $challenge->getResult());

        return Command::SUCCESS;
    }
}