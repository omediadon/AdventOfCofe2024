<?php

namespace App\Handler\DayOne;

use App\Handler\HandlerInterface;
use Exception;

abstract class DayOne implements HandlerInterface{
    protected array $left;
    protected array $right;
    private string  $defaultInput = __DIR__ . '/../../../var/inputs/day1.txt';
    private string  $data;

    /**
     * @throws \Exception
     */
    public function __construct(private string $input = '',){
        if(empty($this->input)){
            $this->input = realpath($this->defaultInput);
        }

        $this->getDataFromInputFile();

        if(empty($this->data) || !$this->splitNumbersIntoPairs()){
            throw new Exception('Invalid input');
        }
    }

    /**
     * @throws \Exception
     */
    private function getDataFromInputFile(): void{
        if(!file_exists($this->input)){
            throw new Exception('Invalid input');
        }
        $this->data = file_get_contents($this->input);
    }

    protected function splitNumbersIntoPairs(): bool{
        $left  = [];
        $right = [];

        // Split the string by any amount of whitespace
        $numbers = preg_split('/\s+/', trim($this->data));

        // Loop through the numbers in pairs
        for($i = 0; $i < count($numbers); $i += 2){
            $left[]  = (int) $numbers[$i];
            $right[] = (int) $numbers[$i + 1];
        }

        sort($left);
        sort($right);

        $this->left  = $left;
        $this->right = $right;

        return sizeof($this->right) == sizeof($this->left);
    }
}