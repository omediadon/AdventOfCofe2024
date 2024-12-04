# Advent Of Code - 2024

This repo is my personal attempt to collect all this year's stars in AdventOfCode.

## Access the challenge

You can access the challenge on their official website through this [link](https://adventofcode.com/2024).

## How to run this project

After cloning this repo, move inside the recently created directory and run

```bash  
php src/run.php
```


## How to debug this project  (using PhpStorm and xDebug)

After cloning this repo
- open the recently created directory as a PhpStorm directory  
- Create the needed mapping for your project (if it is on WSL or a docker container)
- Give your mapping a fitting name. e.g.: Advent
- Run the following commands

if you use a container, run this first 

```bash  
export XDEBUG_MODE=debug XDEBUG_SESSION=1 PHP_IDE_CONFIG="serverName=Advent"
```

If you don't, just run

```bash  
export XDEBUG_MODE=debug XDEBUG_SESSION=1
```

Then

```bash  
php src/run.php
```

#### _Note:_
_Consequent debug-runs do not require the first command during the same IDE session_
