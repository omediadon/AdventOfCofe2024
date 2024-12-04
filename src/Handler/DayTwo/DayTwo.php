<?php

namespace App\Handler\DayTwo;

use App\Handler\HandlerInterface;
use Exception;

abstract class DayTwo implements HandlerInterface{
    protected array $data;
    private string  $defaultInput = __DIR__ . '/../../../var/inputs/day2.txt';

    /**
     * @throws \Exception
     */
    public function __construct(private string $input = '',){
        if(empty($this->input)){
            $this->input = realpath($this->defaultInput);
        }

        $this->getDataFromInputFile();

        if(empty($this->data)){
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
        $this->data = file($this->input, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
}