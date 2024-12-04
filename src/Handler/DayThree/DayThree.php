<?php

namespace App\Handler\DayThree;

use App\Handler\HandlerInterface;
use Exception;

abstract class DayThree implements HandlerInterface{
    protected string $data;
    private string   $defaultInput = __DIR__ . '/../../../var/inputs/day3.txt';

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
        $this->data = file_get_contents($this->input);
    }
}